<?php
/**
 * Created by PhpStorm.
 * User: phithon
 * Date: 2019/1/7
 * Time: 3:53
 */

namespace Chip\Visitor;


use Chip\BaseVisitor;
use Chip\Message;
use PhpParser\Node;
use Chip\Code;
use PhpParser\Node\Expr\ShellExec;

class Shell extends BaseVisitor
{
    protected $check_node_class = [
        ShellExec::class
    ];

    public function process(Node $node)
    {
        if (Code::hasVariable($node) || Code::hasFunctionCall($node)) {
            Message::critical('任意命令执行漏洞');
        }
    }
}