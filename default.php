<txp:output_form form="head" />

<body id="<txp:section />">

<!-- header -->
<txp:output_form form="headandnav" />


<div id="content">

<div class="container_24">
<h1 class="title grid_24"><txp:site_slogan /></h1>
<div class="line">&nbsp;</div>
</div>


<div class="container_24">

<txp:if_search>
<txp:article pgonly="1" searchall="0" searchsticky="1" limit="999" />
<txp:if_search_results>
<h3 class="line">You searched for <strong><txp:page_url type="q" /></strong>. <txp:search_result_count />.</h3>
<txp:else />
<p>Your search for <strong><txp:page_url type="q" /></strong> did not match any documents.</p>
<h3>Suggestions:</h3>
<ul>
<li>Make sure all words are spelled correctly.</li>
<li>Try fewer keywords</li>
<li>Use our menu links above. Parts of the site are not included in the search facility</li>
</ul>
</txp:if_search_results>
<txp:article limit="999" searchall="0" />
<txp:else />
<main>
<article>
<section class="grid_6">

<h3>About</h3>
<txp:article_custom id="1"><txp:excerpt /><p><txp:permlink>read more&#8230;</txp:permlink></p></txp:article_custom>

</section></article>
<section class="grid_6 nos">
<h3>Diary of events</h3>

</section>
<section class="grid_6 nos">
<h3>Announcements</h3>


</section>
<section class="grid_6 nos">
<h3>Latest entries</h3>
<txp:recent_articles label="" limit="10"  break="li" wraptag="ul" /> 
</section></main>
</txp:if_search>

<div class="clear">&nbsp;</div>

</div></div>

 <txp:output_form form="footer" />

</body>
</html>
