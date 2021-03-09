let tableHead = document.getElementById('tableHead');
let tableBody = document.getElementById('tableBody');

const getAddresses = async () => {

    try {
        const res = await fetch('php/get-address.php');

        const data = await res.json();

        if (data) {
            tableHead.innerHTML = '<tr><th>Name</th><th>Last Name</th><th>Address</th><th>City</th><th>Province</th><th>Postal Code</th><th>Move-In Date</th></tr>';

            data.forEach(employee => {
                tableBody.innerHTML += `<tr>
                <td>${employee.firstName}</td>
                <td>${employee.lastName}</td>
                <td>${employee.address}</td>
                <td>${employee.city}</td>
                <td>${employee.province}</td>
                <td>${employee.postalCode}</td>
                <td>${employee.moveInDate}</td>
                </tr>`
            });
        }
    } catch (error) {
        console.log(error);

        tableHead.innerHTML = '<tr><th>Name</th><th>Last Name</th><th>Address</th><th>City</th><th>Province</th><th>Postal Code</th><th>Move-In Date</th></tr>';

        tableBody.innerHTML = `<tr><td colspan= 7>No data</td></tr>`;
    }
}

getAddresses();