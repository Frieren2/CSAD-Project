<style>

table {
    width: 100%;
    border-collapse: collapse;
    font-family: Arial, sans-serif;
    background-color: white;
}

/* Styling the table header */
th {
    background-color: #3D2A54;
    color: white;
    font-weight: bold;
    padding: 12px;
    text-align: left;
}

/* Styling table rows */
td {
    padding: 12px;
    border-bottom: 1px solid #ddd;
    color: #333;
}

/* Alternating row colors */
tr:nth-child(even) {
    background-color: #f8f8f8;
}

/* Hover effect on rows */
tr:hover {
    background-color: #e6e6e6;
}
</style>

<div class="headers" style="display: flex; gap: 20px; flex-direction: column;">
    <h1>View Bookings</h1>
    <div>
    <table>
        <tr>
            <th>Email</th>
            <th>Show</th>
            <th>Cinema</th>
            <th>Screen</th>
            <th>Showtime</th>
            <th>Seat Number</th>
        </tr>
        <tr>
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>4</td>
            <td>5</td>
            <td>6</td>
        </tr>
    </table>
    </div>
</div>
