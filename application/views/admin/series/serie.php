<?php
$this->buttoner[] = array(
	'text' => _('Delete serie'),
	'href' => site_url('/admin/series/delete/serie/'.$comic->id),
	'plug' => _('Do you really want to delete this serie and its chapters?')
);

echo buttoner();

echo form_open_multipart("");
echo $table;
echo form_close();
?>



<div class="section"><?php echo _("Chapters") ?>:</div>
<?php
	$this->buttoner = array(
		array(
			'href' => site_url('/admin/series/add_new/'.$comic->stub),
			'text' => _('Add chapter')
		)
	);
	
	if($this->tank_auth->is_admin())
	{
		$this->buttoner[] = array(
			'href' => site_url('/admin/series/import/'.$comic->stub),
			'text' => _('Import from folder')
		);
	}
			
	echo buttoner();
?>


<div class="list chapters">

<?php

    foreach ($chapters as $item)
    {
        echo '<div class="item">
                <div class="title"><a href="'.site_url("admin/series/serie/".$comic->stub."/".$item->id).'">'. $item->title().'</a></div>
                <div class="smalltext info">
                    Chapter #'.$item->chapter.'
                    Sub #'.$item->subchapter;
					if(isset($item->jointers))
					{
						echo ' By ';
						foreach($item->jointers as $key2 => $jointe)
						{
							if($key2>0) echo " | ";
							echo '<a href="'.site_url("/admin/users/teams/".$jointe->stub).'">'.$jointe->name.'</a>';
						}
					}
					else echo '
                    By <a href="'.site_url("/admin/users/teams/".$item->team_stub).'">'.$item->team_name.'</a>';
                echo '</div>
                <div class="smalltext">
                    <a href="#" onclick="">'._('Quick tools').'</a>
                </div>';
             echo '</div>';
    }

?>
    
</div>


