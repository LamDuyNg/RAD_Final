<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Handle Penalties</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <header>
            <h1>Handle Penalties</h1>
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
                <h2>Handle Penalties</h2>
                <form>
                    <label for="order_id">Order ID:</label>
                    <input type="text" id="order_id" name="order_id">
                    <label for="penalty_reason">Penalty Reason:</label>
                    <textarea id="penalty_reason" name="penalty_reason"></textarea>
                    <label for="amount">Amount:</label>
                    <input type="text" id="amount" name="amount">
                    <button type="submit">Record Penalty</button>
                </form>
            </section>
        </main>
    </div>
</body>
</html>
