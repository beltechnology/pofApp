			<div class=" col-md-2 side-menu-bar">
             <nav class="main-menu">
            <ul class="nav nav-list">
        @foreach ($articles as $article)
<?php
$url = Request::url();
$modalUrl = explode("/",$article->muduleLink);

foreach ($modalUrl as $key => $value)
{
	if (empty($value))
	{
	unset($modalUrl[$key]);
	}
}

$activeDiv = implode(" ",$modalUrl);

if (Request::is($activeDiv.'/*') || url($article->muduleLink) == $url )
{
    $active = "active";
	
}
else
{
	$active = "";
}
?>
	@if($article->moduleType === 1)	
        <li class="sideMenu"> 
			<a class="menu {{$active}}"  href="{{ url($article->muduleLink) }}">
			   <i class="{{ $article->image }}"></i>
					{{ $article->name }}
			</a>
		</li>
		@endif
        @endforeach 
		<li>
<?php
$url = Request::url();
?>
                </li>

            </ul>

        </nav>
        	
</div>
