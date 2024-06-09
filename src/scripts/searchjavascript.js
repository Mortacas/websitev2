document.addEventListener("DOMContentLoaded", function() {
    loadAvailableBooks();

    document.getElementById("bookRequestForm").addEventListener("submit", function(event) {
        event.preventDefault();
        requestBooks();
    });

    document.getElementById("searchButton").addEventListener("click", searchBooks);
});

function loadAvailableBooks() {
    const tableBody = document.getElementById("search_table").getElementsByTagName("tbody")[0];
    tableBody.innerHTML = "";

    fetch('../database_operations.php')
        .then(response => response.json())
        .then(data => {
            const availableBooks = data.filter(row => row.student_name.trim() === "");

            availableBooks.forEach(book => {
                const row = tableBody.insertRow();
                const indicesToShow = [0, 1, 2];
                indicesToShow.forEach(index => {
                    const cell = row.insertCell();
                    cell.textContent = book[index];
                });

                const actionCell = row.insertCell();
                actionCell.innerHTML = `<input type="checkbox" name="bookRequest" value="${book.unit_id}">`;
            });
        })
        .catch(error => {
            console.error('Error loading available books:', error);
        });
}

function searchAvailableBooks() {
    const input = document.getElementById("searchInput").value.toUpperCase();
    const table = document.getElementById("search_table");
    const tr = table.getElementsByTagName("tr");

    for (let i = 1; i < tr.length; i++) {
        const td = tr[i].getElementsByTagName("td")[1];
        if (td) {
            const txtValue = td.textContent || td.innerText;
            tr[i].style.display = txtValue.toUpperCase().indexOf(input) > -1 ? "" : "none";
        }
    }
}

function requestBooks() {
    const checkboxes = document.querySelectorAll('input[name="bookRequest"]:checked');
    let selectedBooks = [];
    checkboxes.forEach((checkbox) => {
        selectedBooks.push(checkbox.value);
    });

    if (selectedBooks.length === 0) {
        alert("Please select at least one book to request.");
        return;
    }

    fetch('requestBook.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ bookIds: selectedBooks })
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
        checkboxes.forEach((checkbox) => checkbox.checked = false);
    })
    .catch(error => {
        console.error('Error requesting books:', error);
    });
}
