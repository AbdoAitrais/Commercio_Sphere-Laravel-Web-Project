<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
    <span class="block sm:inline">
        {{$slot}}
    </span>
    <span class="absolute top-0 bottom-0 right-0 px-4 py-3 ">
        <i class="fa fa-x cursor-pointer"></i>    
    </span>
</div>
<script>
    document.querySelectorAll('.fa-x').forEach(function (x) {
        x.addEventListener('click', function () {
            this.parentElement.parentElement.remove();
        })
    })
</script>
