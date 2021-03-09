// Different Elements in the html
let tableHead = document.getElementById('tableHead');
let tableBody = document.getElementById('tableBody');

let itemForm = document.getElementById('itemForm');
let itemName = document.getElementById('itemName');
let itemWeight = document.getElementById('itemWeight');
let itemLength = document.getElementById('itemLength');
let itemWidth = document.getElementById('itemWidth');
let itemHeight = document.getElementById('itemHeight');

let itemNameValue, weightValue, lengthValue, widthValue, heightValue;

const getItems = async () => {

    try {
        const res = await fetch('php/get-items.php');

        const data = await res.json();

        if (data) {
            tableHead.innerHTML = '<tr><th>Item</th><th>Weight</th><th>Dimensions</th></tr>';

            data.forEach(item => {
                tableBody.innerHTML += `<tr><td>${item.itemName}</td><td>${item.itemWeight.toFixed(2)} kg</td><td>${item.itemLength}cm x ${item.itemWidth}cm x ${item.itemHeight}cm</td></tr>`
            });
        }
    } catch (error) {
        console.log(error);

        tableHead.innerHTML = '<tr><th>Item</th><th>Weight</th><th>Dimensions</th></tr>';

        tableBody.innerHTML = `<tr><td colspan= 3>No data</td></tr>`;
    }
}

getItems();

const addItems = async (url, data) => {
    try {
        const res = await fetch(url, {
            method: 'POST',
            body: data
        });

        return res.json();

    } catch (error) {
        console.log(error);
    }
}

if (itemForm && itemName && itemWeight && itemLength && itemWidth && itemHeight) {
    itemForm.onsubmit = (e) => {
        e.preventDefault();

        let data = new FormData(itemForm);

        itemNameValue = itemForm.itemName.value.trim();
        weightValue = itemForm.itemWeight.value.trim();
        lengthValue = itemForm.itemLength.value.trim();
        widthValue = itemForm.itemWidth.value.trim();
        heightValue = itemForm.itemHeight.value.trim();

        if (itemNameValue != '' && weightValue != '' && lengthValue != '' && widthValue != '' && heightValue != '') {

            addItems('php/add-item.php', data);

            tableBody.innerHTML = '';

            getItems();

            itemName.value = '';
            itemWeight.value = '';
            itemLength.value = '';
            itemWidth.value = '';
            itemHeight.value = '';

        } else {
            return false;
        }
    }
}