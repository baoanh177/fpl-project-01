const productsApp = {
    rows: document.querySelectorAll(".js-product-row"),
    searchInput: document.querySelector(".js-search-product"),
    addEvent() {
        this.searchInput.oninput = (e) => {
            this.rows.forEach(row => {
                const rowText = row.querySelector(".js-product-name").innerText
                if(rowText.toLowerCase().includes(e.target.value.toLowerCase())) {
                    row.style.display = ''
                }else {
                    row.style.display = 'none'
                }
            })
        }
    },
    start() {
        this.addEvent()
    }
}

productsApp.start()