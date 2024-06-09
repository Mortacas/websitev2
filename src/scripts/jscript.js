        window.onload = function() {
            loadTableData();
        };

        function loadTableData() {
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'data_handler.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (this.status === 200) {
                    const table = document.getElementById("data_table");
                    const data = JSON.parse(this.responseText);
                    while (table.rows.length > 1) {
                        table.deleteRow(1);
                    }
                    data.forEach(rowData => {
                        addRowToTable(rowData);
                    });
                }
            };
            xhr.send('action=load');
        }

        function saveTableData() {
            const table = document.getElementById("data_table");
            let data = [];
            for (let i = 1; i < table.rows.length; i++) {
                let row = table.rows[i];
                let rowData = [];
                for (let j = 0; j < 8; j++) {
                    rowData.push(row.cells[j].innerText);
                }
                data.push(rowData);
            }
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'data_handler.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (this.status === 200) {
                    alert(this.responseText);
                }
            };
            xhr.send('action=save&data=' + JSON.stringify(data));
        }

        function addRow() {
            var inputs = [];
            for (let i = 1; i <= 8; i++) {
                inputs.push(document.getElementById("input" + i).value);
                document.getElementById("input" + i).value = ""; 
            }
            addRowToTable(inputs);
            saveTableData();
        }

        function addRowToTable(inputs) {
            var table = document.getElementById("data_table");
            var newRow = table.insertRow(table.length);
            for (let i = 0; i < 8; i++) {
                let cell = newRow.insertCell(i);
                cell.innerText = inputs[i]; 
            }
            var cell = newRow.insertCell(8);
            cell.innerHTML = `<button onclick="editRow(this)">Edit</button><button onclick="deleteRow(this)">Delete</button>`;
        }

        function deleteRow(r) {
            var i = r.parentNode.parentNode.rowIndex;
            document.getElementById("data_table").deleteRow(i);
            saveTableData();
        }

        function editRow(r) {
            var i = r.parentNode.parentNode.rowIndex;
            var row = document.getElementById("data_table").rows[i];
            for (let j = 0; j < 8; j++) {
                var cell = row.cells[j];
                var data = cell.innerText;
                cell.innerHTML = `<input type='text' value='${data}' id='edit${j + 1}'>`;
            }
            row.cells[8].innerHTML = `<button onclick="saveRow(this)">Save</button>`;
        }

        function saveRow(r) {
            var i = r.parentNode.parentNode.rowIndex;
            var row = document.getElementById("data_table").rows[i];
            for (let j = 0; j < 8; j++) {
                var input = document.getElementById(`edit${j + 1}`).value;
                row.cells[j].innerText = input;
            }
            row.cells[8].innerHTML = `<button onclick="editRow(this)">Edit</button><button onclick="deleteRow(this)">Delete</button>`;
            saveTableData();
        }

        function importCSV() {
            const input = document.getElementById("tableData");
            const file = input.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const text = e.target.result;
                    const rows = text.split('\n').map(row => row.split(','));
                    rows.forEach(row => {
                        if (!rowExists(row)) {
                            addRowToTable(row);
                        }
                    });
                    saveTableData();
                };
                reader.readAsText(file);
            }
        }

        function rowExists(row) {
            const table = document.getElementById("data_table");
            for (let i = 1; i < table.rows.length; i++) {
                let tableRow = table.rows[i];
                let match = true;
                for (let j = 0; j < 8; j++) {
                    if (tableRow.cells[j].innerText.trim() !== row[j].trim()) {
                        match = false;
                        break;
                    }
                }
                if (match) return true;
            }
            return false;
        }

        function exportToCSV() {
            const table = document.getElementById("data_table");
            let data = [];
            for (let i = 1; i < table.rows.length; i++) {
                let row = table.rows[i];
                let rowData = [];
                for (let j = 0; j < 8; j++) {
                    rowData.push(row.cells[j].innerText);
                }
                data.push(rowData);
            }
            
            let csvContent = "data:text/csv;charset=utf-8,";
            csvContent += "Unit ID,Book Name,ISBN,Student Name,Student CTC,Student Email,Signed out Date,Return Date\n";

            data.forEach(row => {
                let rowContent = row.join(",");
                csvContent += rowContent + "\n";
            });

            const encodedUri = encodeURI(csvContent);
            const link = document.createElement("a");
            link.setAttribute("href", encodedUri);
            link.setAttribute("download", "tableData.csv");
            document.body.appendChild(link); 

            link.click();
            document.body.removeChild(link);
        }

        function searchTable() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("data_table");
            tr = table.getElementsByTagName("tr");

            for (i = 1; i < tr.length; i++) {
                var rowMatches = false;
                td = tr[i].getElementsByTagName("td");
                for (var j = 0; j < td.length; j++) { 
                    if (td[j]) {
                        txtValue = td[j].textContent || td[j].innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            rowMatches = true; 
                            break;
                        }
                    }
                }
                if (rowMatches) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }

        function filterByAvailability() {
            var table, tr, i, nameCell, isChecked;
            isChecked = document.getElementById("availabilityFilter").checked;
            table = document.getElementById("data_table");
            tr = table.getElementsByTagName("tr");

            for (i = 1; i < tr.length; i++) { 
                nameCell = tr[i].getElementsByTagName("td")[3]; 
                if (isChecked) {
                    if (nameCell.textContent.trim() === "") {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none"; 
                    }
                } else {
                    tr[i].style.display = ""; 
                }
            }
        }

        function filterCheckedOut() {
            var table, tr, i, nameCell;
            table = document.getElementById("data_table");
            tr = table.getElementsByTagName("tr");

            for (i = 1; i < tr.length; i++) { 
                nameCell = tr[i].getElementsByTagName("td")[3]; 
                if (nameCell.textContent.trim() !== "") {
                    tr[i].style.display = ""; 
                } else {
                    tr[i].style.display = "none"; 
                }
            }
        }