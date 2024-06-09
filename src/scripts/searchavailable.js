 document.addEventListener('DOMContentLoaded', function() {
            loadEntries();
        });

        function loadEntries() {
            fetch('database_operations.php')
                .then(response => response.json())
                .then(data => {
                    const table = document.getElementById('entries_table');
                    table.innerHTML = `
                        <tr>
                            <th>Unit ID</th>
                            <th>Book Name</th>
                            <th>ISBN</th>
                        </tr>`;
                    data.forEach(entry => {
                        if (entry.student_name === "") {
                            const row = table.insertRow();
                            row.innerHTML = `
                                <td>${entry.unit_id}</td>
                                <td>${entry.book_name}</td>
                                <td>${entry.isbn}</td>
                            `;
                        }
                    });
                })
                .catch(error => {
                    console.error('Error loading entries:', error);
                });
        }