<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Carbon\Carbon;
use Illuminate\Support\Str;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    // private $name;
    public $subject1;
    private $email;
    private $body;
    public $time;
    public $number;
    // private $data = [];


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($inputs)
    {
        // $this->name = $inputs['name'];
        $this->subject1 = $inputs['subject'];
        $this->email = $inputs['email'];
        $this->body = $inputs['body'];
        $this->time = date('Y年m月d日 G:i:s D',strtotime(Carbon::now()));
        $this->number = Str::randomNumber(10);
        // $this->data['inputs'] = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->view('emails.contact')->with([
            // 'name' => $this->name,
            'subject' => $this->subject1,
            'email' => $this->email,
            'body'  => $this->body,
            'time'  => $this->time,
            'number' => $this->number

        ])
        ->subject('【Dictionary】お問い合わせいただきありがとうございます。');
        // from：メールの送信者を指定
        // with:テンプレートビューへデータを渡す（メール内でファイル名やIDを表示する場合など）
        // subject:メールタイトルを指定
        // text:メールを平文テキストで送付する際にtextメソッドでテンプレートを指定する
        // view:メールをHTMLで送付する際にtextメソッドでテンプレートを指定する
    }
}
// from($this->name)->
