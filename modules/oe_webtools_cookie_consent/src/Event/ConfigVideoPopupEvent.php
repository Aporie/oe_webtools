<?php

declare(strict_types = 1);

namespace Drupal\oe_webtools_cookie_consent\Event;

use Drupal\Core\Cache\RefinableCacheableDependencyInterface;
use Drupal\Core\Cache\RefinableCacheableDependencyTrait;
use Symfony\Component\EventDispatcher\Event;

/**
 * Event fired when a preprocess media oembed iframe is displayed.
 *
 * @see oe_webtools_cookie_consent_preprocess_media_oembed_iframe()
 */
class ConfigVideoPopupEvent extends Event implements RefinableCacheableDependencyInterface {

  use RefinableCacheableDependencyTrait;

  /**
   * This event allows you to set the Cookie consent variable.
   *
   * @Event Drupal\oe_webtools_cookie_consent\Event\WebtoolsImportDataEvent
   */
  public const NAME = 'oe_webtools_cookie_consent.data_collection_video_popup';

  /**
   * The CCK configuration name.
   */
  public const CONFIG_NAME = 'oe_webtools_cookie_consent.settings';

  /**
   * Name of the variable in the CCK configuration.
   */
  public const VIDEO_POPUP = 'video_popup';

  /**
   * Whether the override of Media Oembed is enabled or not.
   *
   * @var bool
   */
  protected $videoPopup = TRUE;

  /**
   * CookieConsentEvent constructor.
   */
  public function __construct() {
    $this->setVideoPopup();
  }

  /**
   * {@inheritdoc}
   */
  public function setVideoPopup(bool $videoPopup = TRUE): void {
    $this->videoPopup = $videoPopup;
  }

  /**
   * {@inheritdoc}
   */
  public function isVideoPopup(): bool {
    return $this->videoPopup;
  }

}
