<?php
include 'includes/session.php';

function generateRow() {
    $contents = '';

    try {
        // Hardcoded data for demonstration
        $data = array(
            array(
                'driver_name' => 'Oleksandr Shakhov',
                'customer_name' => 'Alice Smith',
                'customer_city' => 'Lethbridge',
                'customer_address' => '123 Main St',
                'customer_phone' => '825-594-21-33',
                'zone' => '2',
				'product' => 'Tree 2',
				'order' => '255288255',
				'total' => '99',
				'delivery_date' => '2024-03-29',
            ),
            array(
                'driver_name' => 'Mary Rose',
                'customer_name' => 'Bob Johnson',
                'customer_city' => 'Fort Macleod',
                'customer_address' => '456 Elm St',
                'customer_phone' => '825-598-58-58',
                'zone' => '1',
				'product' => 'Tree 1',
				'order' => '444445255',
				'total' => '129',
				'delivery_date' => '2024-03-26',
            ),
			array(
                'driver_name' => 'Mary Rose',
                'customer_name' => 'Bob Johnson',
                'customer_city' => 'Taber',
                'customer_address' => '456 Elm St',
                'customer_phone' => '825-598-58-58',
                'zone' => '3',
				'product' => 'Tree 3',
				'order' => '444445255',
				'total' => '179',
				'delivery_date' => '2024-03-26',
            ),
            // Add more hardcoded rows as needed
        );

        // Construct table rows using hardcoded data
        foreach ($data as $row) {
            $contents .= '
            <tr>
                <td>' . $row['driver_name'] . '</td>
                <td>' . $row['customer_name'] . '</td>
                <td>' . $row['customer_city'] . '</td>
                <td>' . $row['customer_address'] . '</td>
                <td>' . $row['customer_phone'] . '</td>
                <td>' . $row['zone'] . '</td>
				<td>' . $row['product'] . '</td>
				<td>' . $row['order'] . '</td>
				<td>' . $row['total'] . '</td>
				<td>' . $row['delivery_date'] . '</td>
            </tr>
            ';
        }
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }

    return $contents;
}
$conn = $pdo->open();

// Start output buffering
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Report</title>
    <style>
        /* Define your CSS styles for the printable document */
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Delivery Report</h2>
    <table>
        <thead>
            <tr>
                <th>Driver Name</th>
                <th>Customer Name</th>
                <th>Customer City</th>
                <th>Customer Address</th>
                <th>Customer Phone Number</th>
				<th>Zone</th>
				<th>Product</th>
				<th>Order#</th>
				<th>Total $</th>
                <th>Delivery Date</th>
            </tr>
        </thead>
        <tbody>
            <?= generateRow($conn) ?>
        </tbody>
    </table>

    <!-- JavaScript to trigger print dialog when page loads -->
    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</body>
</html>

<?php
// Get the contents of the output buffer
$html = ob_get_clean();

// Output the HTML content
echo $html;

// Close the database connection
$pdo->close();
?>
