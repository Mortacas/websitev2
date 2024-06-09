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
                    <th>Student Name</th>
                    <th>CTC #</th>
                    <th>Email</th>
                    <th>Date Signed Out</th>
                    <th>Date to Return</th>
                    <th>Actions</th>
                </tr>`;
            data.forEach(entry => {
                const row = table.insertRow();
                row.innerHTML = `
                    <td>${entry.unit_id}</td>
                    <td>${entry.book_name}</td>
                    <td>${entry.isbn}</td>
                    <td>${entry.student_name}</td>
                    <td>${entry.ctc}</td>
                    <td>${entry.email}</td>
                    <td>${entry.date_signed_out}</td>
                    <td>${entry.date_to_return}</td>
                    <td>
                        <button onclick="editEntry(${entry.id}, '${entry.unit_id}', '${entry.book_name}', '${entry.isbn}', '${entry.student_name}', '${entry.ctc}', '${entry.email}', '${entry.date_signed_out}', '${entry.date_to_return}')">Edit</button>
                        <button onclick="deleteEntry(${entry.id})">Delete</button>
                    </td>
                `;
            });
        })
        .catch(error => {
            console.error('Error loading entries:', error);
        });
}

function addEntry() {
    const formData = new FormData(document.getElementById('entry_form'));
    formData.append('action', 'add');
    fetch('database_operations.php', {
        method: 'POST',
        body: formData
    }).then(response => response.text())
      .then(data => {
          alert(data);
          loadEntries();
          document.getElementById('entry_form').reset();
      })
      .catch(error => {
          console.error('Error adding entry:', error);
      });
}

function editEntry(id, unit_id, book_name, isbn, student_name, ctc, email, date_signed_out, date_to_return) {
    document.getElementById('entry_id').value = id;
    document.getElementById('unit_id').value = unit_id;
    document.getElementById('book_name').value = book_name;
    document.getElementById('isbn').value = isbn;
    document.getElementById('student_name').value = student_name;
    document.getElementById('ctc').value = ctc;
    document.getElementById('email').value = email;
    document.getElementById('date_signed_out').value = date_signed_out;
    document.getElementById('date_to_return').value = date_to_return;
    document.getElementById('save_button').onclick = updateEntry;
}

function updateEntry() {
    const formData = new FormData(document.getElementById('entry_form'));
    formData.append('action', 'edit');
    fetch('database_operations.php', {
        method: 'POST',
        body: formData
    }).then(response => response.text())
      .then(data => {
          alert(data);
          loadEntries();
          document.getElementById('save_button').onclick = addEntry;
          document.getElementById('entry_form').reset();
      })
      .catch(error => {
          console.error('Error updating entry:', error);
      });
}

function deleteEntry(id) {
    if (confirm('Are you sure you want to delete this entry?')) {
        const formData = new FormData();
        formData.append('action', 'delete');
        formData.append('id', id);
        fetch('database_operations.php', {
            method: 'POST',
            body: formData
        }).then(response => response.text())
          .then(data => {
              alert(data);
              loadEntries();
          })
          .catch(error => {
              console.error('Error deleting entry:', error);
          });
    }
}

function uploadFile() {
    const formData = new FormData(document.getElementById('upload_form'));
    formData.append('action', 'upload');
    fetch('database_operations.php', {
        method: 'POST',
        body: formData
    }).then(response => response.text())
      .then(data => {
          alert(data);
          loadEntries();
      })
      .catch(error => {
          console.error('Error uploading file:', error);
      });
}

function exportToCSV() {
    fetch('database_operations.php?action=export')
        .then(response => response.blob())
        .then(blob => {
            const url = window.URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.style.display = 'none';
            a.href = url;
            a.download = 'entries.csv';
            document.body.appendChild(a);
            a.click();
            window.URL.revokeObjectURL(url);
        })
        .catch(error => {
            console.error('Error exporting to CSV:', error);
        });
}
