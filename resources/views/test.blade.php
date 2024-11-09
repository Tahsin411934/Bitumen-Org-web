<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataTables Test</title>
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <!-- DataTables Buttons CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.0/css/buttons.dataTables.min.css">
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold text-center mb-8">Test Supplier List</h1>
        <table id="testTable" class="display w-full bg-white border border-gray-300 rounded-lg shadow-lg">
            <thead class="bg-gray-200">
                <tr>
                    <th>Supplier ID</th>
                    <th>Supplier Name</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Contact Person</th>
                    <th>Mobile</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>101</td>
                    <td>John Doe Supplies</td>
                    <td>123 Street Ave</td>
                    <td>New York</td>
                    <td>John Doe</td>
                    <td>1234567890</td>
                    <td>john@example.com</td>
                </tr>
                <tr>
                    <td>105</td>
                    <td>John Doe Supplies</td>
                    <td>123 Street Ave</td>
                    <td>New York</td>
                    <td>John Doe</td>
                    <td>1234567890</td>
                    <td>john@example.com</td>
                </tr>
                <tr>
                    <td>107</td>
                    <td>John Doe Supplies</td>
                    <td>123 Street Ave</td>
                    <td>New York</td>
                    <td>John Doe</td>
                    <td>1234567890</td>
                    <td>john@example.com</td>
                </tr>
                <!-- Additional rows can be added here -->
            </tbody>
        </table>
    </div>

    <!-- jQuery (must load before DataTables) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <!-- DataTables Buttons JS -->
    <script src="https://cdn.datatables.net/buttons/2.3.0/js/dataTables.buttons.min.js"></script>
    <!-- JSZip for Excel export -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <!-- PDFMake for PDF export -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <!-- Buttons HTML5 export -->
    <script src="https://cdn.datatables.net/buttons/2.3.0/js/buttons.html5.min.js"></script>
    <!-- Buttons print -->
    <script src="https://cdn.datatables.net/buttons/2.3.0/js/buttons.print.min.js"></script>
    <!-- Buttons ColVis -->
    <script src="https://cdn.datatables.net/buttons/2.3.0/js/buttons.colVis.min.js"></script>

    <!-- DataTables Buttons Configuration -->
    <script>
        $(document).ready(function() {
            $('#testTable').DataTable({
                dom: 'Bfrtip', // This specifies the position of the buttons
                buttons: [
                    'copy',        // Copy to clipboard
                    'excel',       // Excel export
                    'csv',         // CSV export
                    'pdf',         // PDF export
                    'print',       // Print button
                    {
                        extend: 'colvis', // Column visibility button
                        text: 'Column Visibility' // Custom button text
                    }
                ]
            });
        });
    </script>
</body>
</html>
