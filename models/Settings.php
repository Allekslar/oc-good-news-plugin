<?php namespace Lovata\GoodNews\Models;

use Lovata\Toolbox\Models\CommonSettings;

/**
 * Class Settings
 * @package Lovata\GoodNews\Models
 * @author Andrey Kharanenka, a.khoronenko@lovata.com, LOVATA Group
 *
 * @mixin \October\Rain\Database\Builder
 * @mixin \Eloquent
 * @mixin \System\Behaviors\SettingsModel
 */
class Settings extends CommonSettings
{
    const SETTINGS_CODE = 'lovata_goodnews_settings';

    public $settingsCode = 'lovata_goodnews_settings';
}
