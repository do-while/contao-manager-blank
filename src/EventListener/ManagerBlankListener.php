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
            '/<a\s[^>]*href="([^"]*contao-manager[^"]*)"[^>]*>/i',
            static function( array $match ): string
            {
                if( stripos( $match[ 0 ], 'target=' ) !== false )
                {
                    return $match[ 0 ];
                }

                // Fenstername je Manager-Adresse, damit jede Domain ihr eigenes Fenster bekommt.
                // Kein rel="noopener", sonst ignoriert der Browser den Namen.
                $target = 'contao_manager_' . md5( $match[ 1 ] );

                // Vorhandenes Manager-Fenster nur nach vorn holen, ohne es neu zu laden.
                // Geladen wird nur, wenn das Fenster neu ist oder etwas anderes anzeigt.
                $onclick = "if( event.ctrlKey || event.metaKey || event.shiftKey ) return true; "
                         . "var w = window.open( '', this.target ); "
                         . "if( !w ) return true; "
                         . "if( w.location.href.indexOf( 'contao-manager' ) < 0 ) w.location.href = this.href; "
                         . "w.focus( ); "
                         . "return false;";

                return substr( $match[ 0 ], 0, -1 ) . ' target="' . $target . '" onclick="' . $onclick . '">';
            },
            $buffer
        ) ?? $buffer;
    }
}
