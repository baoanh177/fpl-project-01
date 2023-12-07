const search = {
    rows: document.querySelectorAll(".js-row"),
    searchInput: document.querySelector(".js-search"),
    addEvent() {
        this.searchInput.oninput = (e) => {
            this.rows.forEach(row => {
                const rowText = row.querySelector(".js-name").innerText
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

search.start()