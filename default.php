<!DOCTYPE html>
<html lang="<txp:lang />">

<head>
  <meta charset="utf-8">
  <title><txp:page_title /></title>
  <meta name="description" content="">
  <meta name="generator" content="Textpattern CMS">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <txp:if_search>
    <meta name="robots" content="none">
  <txp:else />
    <txp:if_category>
      <meta name="robots" content="noindex, follow, noodp, noydir">
    <txp:else />
      <txp:if_author>
        <meta name="robots" content="noindex, follow, noodp, noydir">
      <txp:else />
        <meta name="robots" content="index, follow, noodp, noydir">
      </txp:if_author>
    </txp:if_category>
  </txp:if_search>

  <!-- content feeds -->
  <txp:feed_link flavor="atom" format="link" label="Atom" />
  <txp:feed_link flavor="rss" format="link" label="RSS" />
  <txp:rsd />

  <!-- specify canonical, more info: http://googlewebmastercentral.blogspot.com/2009/02/specify-your-canonical.html -->
  <txp:if_section name="">
    <link rel="canonical" href="<txp:site_url />">
  <txp:else />
    <txp:if_individual_article>
      <link rel="canonical" href="<txp:permlink />">
    <txp:else />
      <link rel="canonical" href="<txp:section url='1' />">
    </txp:if_individual_article>
  </txp:if_section>

  <!-- CSS -->
  <!-- Google font API (remove this if you intend to use the theme in a project without internet access) -->
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Serif:n4,i4,n7,i7|Cousine">

  <txp:css format="link" media="" />
  <!-- ...or you can use (faster) external CSS files eg. <link rel="stylesheet" href="<txp:site_url />css/default.css"> -->

  <!-- HTML5/Media Queries support for IE 8 (you can remove this section and the corresponding 'js' directory files if you don't intend to support IE < 9) -->
  <!--[if lt IE 9]>
    <script src="<txp:site_url />js/html5shiv.js"></script>
    <script src="<txp:site_url />js/css3-mediaqueries.js"></script>
  <![endif]-->

</head>

<body id="<txp:if_section name=""><txp:if_search>search<txp:else />front</txp:if_search><txp:else /><txp:section /></txp:if_section>-page">

  <!-- header -->
  <header role="banner">
    <hgroup>
      <h1><txp:link_to_home><txp:site_name /></txp:link_to_home></h1>
      <h3><txp:site_slogan /></h3>
    </hgroup>
  </header>

  <!-- navigation -->
  <nav role="navigation">
    <h1><txp:text item="navigation" /></h1>
    <txp:section_list default_title='<txp:text item="home" />' include_default="1" wraptag="ul" break="">
      <li<txp:if_section name='<txp:section />'><txp:if_search><txp:else /><txp:if_category><txp:else /><txp:if_author><txp:else /> class="active"</txp:if_author></txp:if_category></txp:if_search></txp:if_section>>
        <txp:section title="1" link="1" />
      </li>
    </txp:section_list>
  </nav>

  <div class="wrapper">
    <div class="container">

      <!-- left (main) column -->
      <div role="main">

      <!-- is this result result page? also omits the pagination links below (uses pagination format within search_results.article.txp instead) -->
      <txp:if_search>

        <h1><txp:text item="search_results" /></h1>
        <txp:output_form form="search_results"/>

      <txp:else />

        <!-- else is this an article category list? -->
        <txp:if_category>

          <h1><txp:text item="category" /> <txp:category title="1" /></h1>
          <txp:article form="article_listing" limit="5" />

        <txp:else />

          <!-- else is this an article author list? -->
          <txp:if_author>

          <h1><txp:text item="author" /> <txp:author /></h1>
          <txp:article form="article_listing" limit="5" />

          <txp:else />

            <!-- else display articles normally -->
            <txp:article limit="5" /> <!-- links by default to form: 'default.article.txp' unless you specify a different form -->

          </txp:if_author>
        </txp:if_category>

        <!-- add pagination links to foot of article/article listings/category listings if there are more articles available,
          this method is more flexibile than using simple txp:link_to_prev/txp:link_to_next or txp:older/txp:newer tags -->
        <p id="paginator">

        <txp:variable name="prev" value='<txp:older />' />
        <txp:variable name="next" value='<txp:newer />' />

        <txp:if_variable name="prev" value="">
          <span id="paginator-l" class="button disabled">&#8592; <txp:text item="older" /></span>
        <txp:else />
          <a id="paginator-l" href="<txp:older />" title="<txp:text item='older' />" class="button">&#8592; <txp:text item="older" /></a>
        </txp:if_variable>
        <txp:if_variable name="next" value="">
          <span id="paginator-r" class="button disabled"><txp:text item="newer" /> &#8594;</span>
        <txp:else />
            <a id="paginator-r" href="<txp:newer />" title="<txp:text item='newer' />" class="button"><txp:text item="newer" /> &#8594;</a>
        </txp:if_variable>

        </p>

      </txp:if_search>

      </div> <!-- /main -->

      <!-- right (complementary) column -->
      <div role="complementary">
        <txp:search_input /> <!-- links by default to form: 'search_input.misc.txp' unless you specify a different form -->

        <!-- Feed links, default flavor is rss, so we don't need to specify a flavor on the first feed_link -->
        <p><txp:feed_link label="RSS" class="feed-rss" /> / <txp:feed_link flavor="atom" label="Atom" class="feed-atom" /></p>

        <h4><txp:text item="external_links" /></h4>
        <txp:linklist wraptag="ul" break="li" limit="10" /> <!-- links by default to form: 'plainlinks.link.txp' unless you specify a different form -->
      </div> <!-- /complementary -->

    </div> <!-- /.container -->
  </div> <!-- /.wrapper -->

  <!-- footer -->
  <footer role="contentinfo">
    <p><small><txp:text item="published_with" /> <a href="http://textpattern.com" rel="external" title="<txp:text item='go_txp_com' />">Textpattern CMS</a>.</small></p>
  </footer>

  <!-- add your own JavaScript here -->

</body>
</html>