<?php

declare(strict_types=1);

namespace Davarch\SecurityHeaders\Generators;

use Davarch\SecurityHeaders\Headers\CertificateTransparency;
use Davarch\SecurityHeaders\Headers\ContentTypeOption;
use Davarch\SecurityHeaders\Headers\PermissionsPolicy;
use Davarch\SecurityHeaders\Headers\ReferrerPolicy;
use Davarch\SecurityHeaders\Headers\RemovingHeader;
use Davarch\SecurityHeaders\Headers\StrictTransportSecurity;
use Davarch\SecurityHeaders\Keywords\Keyword;

final class Basic extends Generator
{
    public function configure(): void
    {
        $this
            ->addHeader(ContentTypeOption::noSniff)
            ->addHeader(ReferrerPolicy::noReferrerWhenDowngrade)

            ->addHeader(StrictTransportSecurity::maxAge)
            ->addHeader(StrictTransportSecurity::includeSubDomains)

            ->addHeader(CertificateTransparency::enforce)
            ->addHeader(CertificateTransparency::maxAge)

            ->addHeaderWithDirective(PermissionsPolicy::autoplay, Keyword::self)
            ->addHeaderWithDirective(PermissionsPolicy::camera, Keyword::empty)
            ->addHeaderWithDirective(PermissionsPolicy::encryptedMedia, Keyword::self)
            ->addHeaderWithDirective(PermissionsPolicy::fullscreen, Keyword::empty)
            ->addHeaderWithDirective(PermissionsPolicy::geolocation, Keyword::self)
            ->addHeaderWithDirective(PermissionsPolicy::gyroscope, Keyword::self)
            ->addHeaderWithDirective(PermissionsPolicy::magnetometer, Keyword::empty)
            ->addHeaderWithDirective(PermissionsPolicy::microphone, Keyword::empty)
            ->addHeaderWithDirective(PermissionsPolicy::midi, Keyword::empty)
            ->addHeaderWithDirective(PermissionsPolicy::payment, Keyword::empty)
            ->addHeaderWithDirective(PermissionsPolicy::syncXhr, Keyword::self)
            ->addHeaderWithDirective(PermissionsPolicy::usb, Keyword::empty)

            ->removeHeader(RemovingHeader::xPoweredBy)
            ->removeHeader(RemovingHeader::server);
    }
}
