<style>
    #create:hover{
        color: white !important;
    }
</style>
<div class="top-right-button-container" style="margin-right: 10px">
    <div class="btn-group">
        <a style="color: #145388" class="btn btn-outline-primary btn-lg" id="create" href="@yield('create-path')">
            Add New {{ucfirst(\Illuminate\Support\Str::singular((request()->segment(2))))}}
        </a>

    </div>
</div>
