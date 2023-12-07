const categoriesApp = {
    rows: document.querySelectorAll(".js-category-row"),
    searchInput: document.querySelector(".js-search_category"),
    addEvent() {
        this.searchInput.oninput = (e) => {
            this.rows.forEach(row => {
                const rowText = row.querySelector(".js-cate-name").innerText
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

categoriesApp.start()