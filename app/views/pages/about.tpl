<h2>Who we've been:</h2>

<!--Content within will be accordioned if js enabled-->
<div id="accordion">

    <!--header-->
    {foreach from=$data item=item}
        <h3><a href="#">{$item.title}</a></h3>
        <div class="inner">
            {$item.body}
        </div>
    {/foreach}
    
</div>
{literal}
<script type="text/javascript">
    $(document).ready(function(){
        $("#accordion").accordion();
    });
</script>
{/literal}
