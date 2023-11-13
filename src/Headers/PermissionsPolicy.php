<?php

declare(strict_types=1);

namespace Davarch\SecurityHeaders\Headers;

enum PermissionsPolicy: string implements Header
{
    case accelerometer = 'accelerometer';
    case ambientLightSensor = 'ambient-light-sensor';
    case autoplay = 'autoplay';
    case battery = 'battery';
    case camera = 'camera';
    case displayCapture = 'display-capture';
    case documentDomain = 'document-domain';
    case encryptedMedia = 'encrypted-media';
    case executionWhileNotRendered = 'execution-while-not-rendered';
    case executionWhileOutOfViewport = 'execution-while-out-of-viewport';
    case fullscreen = 'fullscreen';
    case gamepad = 'gamepad';
    case geolocation = 'geolocation';
    case gyroscope = 'gyroscope';
    case hid = 'hid';
    case identityCredentialsGet = 'identity-credentials-get';
    case idleDetection = 'idle-detection';
    case localFonts = 'local-fonts';
    case magnetometer = 'magnetometer';
    case microphone = 'microphone';
    case midi = 'midi';
    case otpCredentials = 'otp-credentials';
    case payment = 'payment';
    case pictureInPicture = 'picture-in-picture';
    case publickeyCredentialsGet = 'publickey-credentials-get';
    case screenWakeLock = 'screen-wake-lock';
    case serial = 'serial';
    case speakerSelection = 'speaker-selection';
    case storageAccess = 'storage-access';
    case usb = 'usb';
    case webShare = 'web-share';
    case windowManagement = 'window-management';
    case xrSpatialTracking = 'xr-spatial-tracking';
    case syncXhr = 'sync-xhr';

    public function headerKey(): string
    {
        return 'Permissions-Policy';
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function delimiter(): string
    {
        return ', ';
    }
}
