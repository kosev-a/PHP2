let startFrom = 5;
const button = document.querySelector('btn')

function addViewProducts(startFrom) {
    fetch('/handler.php?startFrom=' + startFrom)
        .then(data => data.json())
        .then(data => JSON.parse(data));
    startFrom += 5;

}

button.addEventListener ('click', addViewProducts);