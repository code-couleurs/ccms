<ul id="tabs_revisions">
    <li <?php if(!$is_brouillon) echo 'class="active"' ?>><a href="/<?php echo Request::main()->uri ?>">Page actuelle</a></li>
    <li <?php if($is_brouillon) echo 'class="active"' ?>><a href="/<?php echo Request::main()->uri ?>?brouillon=true">Page en construction</a></li>
</ul>