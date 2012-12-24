<?php
namespace Kdde\EdbBundle\DQL;
use Doctrine\ORM\Query\AST\Functions\FunctionNode,
    Doctrine\ORM\Query\Lexer;

/**
 * MathTextFunction ::= "MATCHTEXT" "(" StringPrimary "," StringPrimary ")"
 */
class MatchText extends FunctionNode
{
    public $query = null;
    public $epi_text = null;

    public function parse(\Doctrine\ORM\Query\Parser $parser)
    {
    	$parser->match(Lexer::T_IDENTIFIER); 
        $parser->match(Lexer::T_OPEN_PARENTHESIS); 
        $this->query = $parser->StringPrimary();
        $parser->match(Lexer::T_COMMA); 
        $this->epi_text = $parser->StringPrimary(); 
        $parser->match(Lexer::T_CLOSE_PARENTHESIS);
    }

    public function getSql(\Doctrine\ORM\Query\SqlWalker $sqlWalker)
    {
        return 'match_text(' .
            $this->query->dispatch($sqlWalker) . ', ' .
            $this->epi_text->dispatch($sqlWalker) .
        ')'; 
    }
}
?>