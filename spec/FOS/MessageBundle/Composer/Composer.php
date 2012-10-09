<?php

namespace spec\FOS\MessageBundle\Composer;

use PHPSpec2\ObjectBehavior;

class Composer extends ObjectBehavior
{
    /**
     * @param FOS\MessageBundle\DocumentManager\MessageManager $messageManager
     * @param FOS\MessageBundle\DocumentManager\ThreadManager  $threadManager
     * @param FOS\MessageBundle\Model\Message                  $message
     * @param FOS\MessageBundle\Model\Thread                   $thread
     */
    public function let($messageManager, $threadManager, $message, $thread)
    {
        $messageManager->createMessage()->willReturn($message);
        $threadManager->createThread()->willReturn($thread);

        $this->beConstructedWith($messageManager, $threadManager);
    }

    function it_should_be_initializable()
    {
        $this->shouldHaveType('FOS\MessageBundle\Composer\Composer');
    }

    function it_should_create_new_threads()
    {
        $this->newThread()->shouldHaveType('FOS\MessageBundle\MessageBuilder\NewThreadMessageBuilder');
    }

    /**
     * @param FOS\MessageBundle\Model\Thread $thread
     */
    function it_should_create_replies($thread)
    {
        $this->reply($thread)->shouldHaveType('FOS\MessageBundle\MessageBuilder\ReplyMessageBuilder');
    }
}
