<?php
namespace Kdde\EdbBundle\DQL;
use Doctrine\ORM\Query\AST\Functions\FunctionNode,
    Doctrine\ORM\Query\Lexer;

/**
 * MathTextFunction ::= "REMOVEDIACR" "(" StringPrimary ")"
 */
class RemoveDiacr extends FunctionNode
{
    public $inscription = null;
    
    public function parse(\Doctrine\ORM\Query\Parser $parser)
    {
    	$parser->match(Lexer::T_IDENTIFIER); 
        $parser->match(Lexer::T_OPEN_PARENTHESIS); 
        $this->inscription = $parser->StringPrimary();
        $parser->match(Lexer::T_CLOSE_PARENTHESIS);
    }

    public function getSql(\Doctrine\ORM\Query\SqlWalker $sqlWalker)
    {
        return 'remove_diacritics(' .
            $this->inscription->dispatch($sqlWalker) .
        ')'; 
    }
}
?>