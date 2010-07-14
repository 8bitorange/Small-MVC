<h2>We are playing some shows</h2>

<!--Begin shows layout table-->
<table>
    <tr>
        <th>Date</th>
        <th>Title</th>
        <th>Location</th>
    </tr>
    
    <!--Loop through shows and display-->
    {foreach from=$events item=event}
       <tr class="{cycle values="odd,even"}">
          <td>{$event.date}</td>
          <td><a href="{$event.link}">{$event.title}</a></td>
          <td>{$event.location}</td>
       </tr>
    {/foreach}
</table>