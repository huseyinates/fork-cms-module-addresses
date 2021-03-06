<?php
namespace Backend\Modules\Addresses\Ajax;
/**
 * Created by PhpStorm.
 * User: cirykpopeye
 * Date: 4/07/17
 * Time: 16:14
 */

use Backend\Core\Engine\Base\AjaxAction;
use Backend\Modules\Addresses\Domain\Group\Command\SortGroups as SortGroupsCommand;
use Symfony\Component\HttpFoundation\Response;

class SortGroups extends AjaxAction
{
    public function execute(): void {
        parent::execute();

        $newIdSequence = trim($this->getRequest()->request->get('new_id_sequence'));
        $this->get('command_bus')->handle(
            new SortGroupsCommand((array) explode(',', rtrim($newIdSequence, ',')))
        );
        $this->output(Response::HTTP_OK, null, 'sequence updated');
    }
}