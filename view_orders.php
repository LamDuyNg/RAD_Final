<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Rental Orders</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <header>
            <h1>View Rental Orders</h1>
        </header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="view_orders.php">View Rental Orders</a></li>
                <li><a href="check_availability.php">Check Availability</a></li>
                <li><a href="process_refunds.php">Process Refunds</a></li>
                <li><a href="handle_penalties.php">Handle Penalties</a></li>
                <li><a href="resolve_complaints.php">Resolve Complaints</a></li>
                <li><a href="report_damages.php">Report Damages</a></li>
            </ul>
        </nav>
        <main>
            <section>
                <h2>Rental Orders</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Customer Name</th>
                            <th>Vehicle ID</th>
                            <th>Rental Start</th>
                            <th>Rental End</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>John Doe</td>
                            <td>1234</td>
                            <td>2024-01-01</td>
                            <td>2024-01-10</td>
                            <td>Confirmed</td>
                        </tr>
                        <!-- Additional rows as needed -->
                    </tbody>
                </table>
            </section>
        </main>
    </div>
</body>
</html>
