<div class="menu">
    <button onclick="menu(this)">Категории</button>
    <div class="category">
        <ul name="cat" id="cat">
            @foreach ($cats as $cat)
            <li><a href="/c/{{ $cat->category }}">{{ $cat->category }}</a></li>
            @endforeach
        </ul>

    </div>
</div>
<script>
    function menu(el){
    if(!el.parentElement.classList.contains('active')){
    ;
    }
    el.parentElement.classList.toggle("active");
        }

let cat = document.getElementById('cat')
    cat.addEventListener('change',function(){
        // console.log(cat.value)
        window.location.href = "/c/"+cat.value;
    })
</script>
<style>
    .menu {
        position: relative;

    }

    .menu button {
        padding: 0 20px;
        background: blue;
        color: #fff;
        cursor: pointer;
        height: 2rem;
        border-radius: 6px;
    }

    .menu .category {
        position: absolute;
        display: none;
    }

    .menu.active .category {
        display: block;
    }

    #cat {
        list-style: none;
        padding: 1rem;
        background: #fff;
        box-shadow: 0 3px 3px #000;
        max-height: 50vh;
        overflow-y: scroll;
        position: relative;
        z-index: 1;
        width: 280px;
    }
</style>