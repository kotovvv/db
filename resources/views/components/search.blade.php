<div class="search">
    <input type="search" name="search" id="search" placeholder="Поиск" />
    <button onclick="search()">Искать</button>
</div>
<script>
    // Enter key search input
    var input = document.getElementById("search");
    input.addEventListener("keypress", function(event) {
    if (event.key === "Enter") {
    event.preventDefault();
    search()
    }
    });

    function search(){
        window.location.href = "/s/"+input.value;
    }
</script>
<style>
    .search {
        display: flex;
        flex: 0 1 100%;
    }

    .search input {
        width: 100%;
        border: 1px solid #ccc;
        height: 2rem;
    }
</style>