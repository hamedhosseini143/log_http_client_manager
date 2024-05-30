<?php

declare(strict_types=1);

namespace Drupal\log_http_client_manager\Controller;

use Drupal;
use Drupal\Core\Controller\ControllerBase;
use Exception;

/**
 * Returns responses for log http client manager routes.
 */
final class LogHttpClientManagerController extends ControllerBase {

  /**
   * Builds the response.
   */
  public function __invoke(): array {
    $service = Drupal::service('http_client_manager.factory')
      ->get('api_log_service');
    try {
      $error500 = $service->call('filesUpload');
      // add log
      Drupal::logger('log_http_client_manager')
        ->info('Error 500: @error500', ['@error500' => json_encode($error500)]);
    }
    catch (Exception $e) {
      Drupal::logger('log_http_client_manager')
        ->error('Error 500: @error500', ['@error500' => $e->getMessage()]);
    }
    try {
      $error400 = $service->call('getProductError');
      // add log
      Drupal::logger('log_http_client_manager')
        ->info('Error 400: @error400', ['@error400' => json_encode($error400)]);
    }
    catch (Exception $e) {
      Drupal::logger('log_http_client_manager')
        ->error('Error 400: @error400', ['@error400' => $e->getMessage()]);
    }

    try {
      $product200 = $service->call('getProduct');
      //      dump($product200);
      // add log
      Drupal::logger('log_http_client_manager')
        ->notice('Product 200: @product200', ['@product200' => 'success']);
    }
    catch (Exception $e) {
      Drupal::logger('log_http_client_manager')
        ->error('Product 200: @product200', ['@product200' => $e->getMessage()]);
    }

    $build['content'] = [
      '#type' => 'item',
      '#markup' => $this->t('It works!'),
    ];

    return $build;
  }

}
