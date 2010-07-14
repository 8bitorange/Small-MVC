<h2>The Latest</h2>

<!--Loop through twitter feed and link to each post-->
<ul id="twitter_feed">
    {foreach from=$feed item=item}
        <li><a href="{$item.link}"><span class="date">{$item.date}</span>{$item.title}</a></li>
    {/foreach}
</ul>