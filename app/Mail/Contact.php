<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    private $name;
    public $subject;
    private $email;
    private $body;
    // private $data = [];


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($inputs)
    {
        $this->name = $inputs['name'];
        $this->subject = $inputs['subject'];
        $this->email = $inputs['email'];
        $this->body = $inputs['body'];
        // $this->data['inputs'] = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from($this->name)->view('emails.contact')->with([
            'name' => $this->name,
            'subject' => $this->subject,
            'email' => $this->email,
            'body'  => $this->body,
        ])
        ->subject($this->subject);
        // from：メールの送信者を指定
        // with:テンプレートビューへデータを渡す（メール内でファイル名やIDを表示する場合など）
        // subject:メールタイトルを指定
        // text:メールを平文テキストで送付する際にtextメソッドでテンプレートを指定する
        // view:メールをHTMLで送付する際にtextメソッドでテンプレートを指定する
    }
}
