<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Slip</title>
    <style>
    /* General Styles */
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
    }

    .page {
        width: 105mm;
        /* A4 width */
        height: 148mm;
        /* Half of A4 height */
        margin: 10mm auto;
        /* Center the page within margins */
        padding: 10mm;
        box-sizing: border-box;
        border: 1px solid black;
        /* Optional border for preview */
    }

    h1 {
        text-align: center;
        margin: 0;
        font-size: 23px;
        margin-bottom: 10px;
    }

    hr {
        border: 1px solid black;
        width: 70%;
        margin: auto;
    }

    .no {
        float: right;
        font-size: 13px;
        font-weight: bold;
    }

    .center-text {
        text-align: center;
        font-weight: normal;
        font-size: 14px;
        margin-top: 5px;
        margin-bottom: 50px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    table,
    th,
    td {
        border: 1px solid black;
    }

    td {
        padding: 5px;
        font-size: 12px;
        position: relative;
    }

    /* CSS for the divider */
    .divider-container {
        display: flex;
        align-items: center;
        height: 100%;
    }

    .divider-container .divider {
        border-right: 1px solid #ccc;
        padding-right: 8px;
        margin-right: 8px;
        height: 100%;
    }

    /* Print-specific adjustments */
    @media print {
        body {
            margin: 0;
            padding: 0;
        }

        .page {
            margin: 0;
            box-shadow: none;
            border: none;
        }
    }
    </style>
</head>

<body>
    <div class="page">
        <h1>MEB Industrial Complex Ltd</h1>
        <hr>
        <div class="center-text">Customer Copy</div>
        <span class="no">No : {{ $meb_infos->no }}</span>
        <table>
            <tbody>
                <tr>
                    <td>DATE</td>
                    <td>{{ \Carbon\Carbon::parse($meb_infos->date_time)->format('d/M/y H:i:s') }}</td>
                </tr>
                <tr>
                    <td>Customer Name</td>
                    <td>{{ $meb_infos->customer_name }}</td>
                </tr>
                <tr>
                    <td>Goods</td>
                    <td>{{ $meb_infos->goods }}</td>
                </tr>
                <tr>
    <td>Gross Weight</td>
    <td>
        <div class="divider-container">
            <span class="divider">{{ $meb_infos->gross_weight_time }}</span>
            <div class="weight-details">
                {{ $meb_infos->gross_weight_amount }} {{ $meb_infos->gross_weight_uom }}
            </div>
        </div>
    </td>
</tr>

                <tr>
                    <td>Tare Weight</td>
                    <td>{{ $meb_infos->tare_weight_amount }} {{ $meb_infos->tare_weight_uom }}</td>
                </tr>
                <tr>
                    <td>Net Weight</td>
                    <td>{{ $meb_infos->net_weight }}</td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td>{{ $meb_infos->price }}</td>
                </tr>
                <tr>
                    <td>Total Price</td>
                    <td>{{ $meb_infos->total_price }}</td>
                </tr>
                <tr>
                    <td>Company</td>
                    <td>{{ $meb_infos->company }}</td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>{{ $meb_infos->address }}</td>
                </tr>
                <tr>
                    <td>Holder</td>
                    <td>{{ $meb_infos->holder }}</td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td>{{ $meb_infos->phone }}</td>
                </tr>
                <tr>
                    <td>DO No</td>
                    <td>{{ $meb_infos->do_no }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
