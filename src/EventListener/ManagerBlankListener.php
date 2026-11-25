<?php

namespace softleister\ContaoManagerBlankBundle\EventListener;

use Contao\CoreBundle\DependencyInjection\Attribute\AsHook;

#[AsHook( 'outputBackendTemplate' )]
class ManagerBlankListener
{
    public function __invoke( string $buffer, string $template ): string
    {
        if( $template != 'be_main' )
        {
            return $buffer;
        }

        return preg_replace_callback(
            '/<a\s[^>]*href="[^"]*contao-manager[^"]*"[^>]*>/i',
            static function( array $match ): string
            {
                if( stripos( $match[ 0 ], 'target=' ) !== false )
                {
                    return $match[ 0 ];
                }

                return substr( $match[ 0 ], 0, -1 ) . ' target="_blank" rel="noopener">';
            },
            $buffer
        ) ?? $buffer;
    }
}
