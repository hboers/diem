<?php
use_stylesheet('lib.ui-tabs');
use_stylesheet('admin.configPanel');
use_javascript('lib.ui-tabs');
use_javascript('core.tabForm');
use_javascript('admin.configPanel');

echo £o('div.dm_config_panel.mt10');

echo £o('ul');
foreach($groups as $group)
{
  echo £('li', sprintf('<a href="#%s">%s</a>', 'dm_setting_group_'.dmString::slugify($group), __(dmString::humanize($group))));
}
echo £c('ul');

echo $form->open('.dm_form.list');

foreach($settings as $group => $groupSettings)
{
  if ('internal' == $group)
  {
    continue;
  }
  echo £o('div#dm_setting_group_'.dmString::slugify($group));
  
  echo £('h2', __(dmString::humanize($group)));
  
  echo £o('ul.dm_setting_group.clearfix');
  $it = 0;
  foreach($groupSettings as $setting)
  {
    $settingName = $setting->get('name');
    
    if (!($it%2))
    {
      echo £c('ul').£o('ul.dm_setting_group.clearfix');
    }
    ++$it;
    
    echo £('li.dm_form_element.clearfix',
      $form[$settingName]->label()->field()->error().
      £('div.dm_help_wrap', escape(__($form[$settingName]->getHelp())))
    );
  }
  echo £c('ul');
  
  echo £c('div');
}

echo $form->renderSubmitTag(__('Save modifications'));

echo '</form>';

echo £c('div');