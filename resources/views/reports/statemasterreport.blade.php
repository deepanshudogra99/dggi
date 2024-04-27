<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>State Master Report</title>
    <style>
      table {
        width: 100%;
        border-collapse: collapse;
      }
      th {
        background-color: #f3f4f6;
        border: 1px solid #d1d5db;
        padding: 8px 4px;
        text-align: left;
      }
      td {
        border: 1px solid #d1d5db;
        padding: 8px 4px;
      }
      tr:nth-child(even) {
        background-color: #f3f4f6;
      }
      tr:nth-child(odd) {
        background-color: #ffffff;
      }
      .heading {
        text-align: center;
        font-size: 24px;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 30px;
        color: green;
        font-weight: bold;
    }
      .watermark-container {
        position: relative;
      }
      .watermark {
        position: absolute;
        bottom: 50%;
        right: 50%;
        font-size: 200px;
        color: rgba(135, 206, 235, 0.1);;
        transform: translate(50%, 50%) rotate(-45deg);
        z-index: -1;
      }
    </style>
</head>
<body>
    <div class="heading">
        District Good Governance Index
    </div>
    <div class="overflow-x-auto">
    <table class="table-auto min-w-full border-collapse border border-gray-300">
        <thead>
        <tr class="bg-gray-200">
            <th class="px-4 py-2">Sr. No</th>
            <th class="px-4 py-2">State Name</th>
            <th class="px-4 py-2">State Abbreviation</th>
        </tr>
        </thead>
        <tbody>
        @foreach($pdfdata as $key => $dt)
        <tr>
            <td class="border px-4 py-2">{{ ++$key }}</td>
            <td class="border px-4 py-2">{{ $dt->stname }}</td>
            <td class="border px-4 py-2">{{ $dt->stabbr }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div class="watermark">
        NIC
    </div>
    </div>
</body>
</html>
