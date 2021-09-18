<!--Search-form-->
<div class="search">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-10 m-auto">
                <div class="search-width">
                    <button type="button" class="close">
                        <i class="far fa-times"></i>
                    </button>
                    <form class="search-form" action="{{route('front.search-posts')}}" method="GET">
                        <input type="search" name="search" placeholder="What are you looking for?">
                        <button type="submit" class="search-btn">
                            <i class="far fa-search"></i>
                            search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>