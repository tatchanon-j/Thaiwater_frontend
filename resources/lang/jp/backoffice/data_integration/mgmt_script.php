<?php
  return[
    'main_menu_name' =>  'データリンク',
    'page_name' =>  'セットのダウンロード',
    'btn_add_script' => 'セットのダウンロード',

    'modal_delete_title' => 'クリアの確認 :"%s"',
    'status_enable' => '有効',
    'status_disable' => '無効にします',

    'download_id' => 'download id',
    'download_name' => '名前ダウンロード',
    'download_method' => 'ダウンロードプロセス',
    'description' => '付け足し',
    'status' => '機能状態',
    'status_cron' => 'ステータスcron',

    'label_download_method' => 'ダウンロードプロセス : ',
    'parsley_download_method' => 'プロセスをダウンロードしてください',
    'label_monitor_script' => 'monitor_script : ',
    'label_crontab_setting' => '時間を設定しますcrontab  : ',
	  'label_max_process' => 'プロセスの最大数 : ',
	  'tooltip_max_process' => 'プロセスの最大数=10のデフォルトをダウンロードするために1に設定することができます。',
    'parsley_crontab_setting' => '時間を記入してください。crontab ',
    'label_download_type' => 'download_type : ',
    'label_download_driver' => 'download_driver : ',
    'parsley_detail_host' => 'ドライバーを入力してください。',
    'parsley_detail_host_url' => 'ホストを入力してください。',
    'label_name' => 'ダウンロードのために行きます : ',
    'parsley_name' => 'ゴーをダウンロードするプログラムの名前を入力してください。',
    'label_download_name' => '名前ダウンロード : ',
    'parsley_download_name' => 'ダウンロードを入力してください。',
    'label_description' => '付け足し',
    'parsley_description' => 'より多くを説明してください。',
    'label_agent_user' => 'ユーザー名機関 : ',
    'parsley_agent_user' => 'ユーザ名の代理店を選択してください。: ',
    'label_data_folder' => 'ダウンロードするファイルのフォルダ : ',
    'parsley_data_folder' => 'ダウンロードするファイルのフォルダを入力してください。',
    'label_retry_count' => '以上のダウンロードと数。 : ',
    'parsley_retry_count' => '与えられた範囲でのダウンロードや、繰り返し情報の数を記入してください。',
    'label_archive_folder' => 'メディアを配置するためのRAWファイルフォルダ : ',
    'parsley_archive_folder' => 'メディアを配置するためのRAWファイルフォルダ',
    'label_result_file' => 'メディアのダウンロードから生成されたJSONファイル名。 : ',
    'parsley_result_file' => 'メディアのダウンロードから生成されたJSONファイルを入力してください。',
    'label_node' => 'Node:',
    'tooltip_node' => 'ダウンロードするサーバー名',

    'label_host' => 'Driver: ',
    'label_host_url' => 'Host: ',
    'label_username' => 'username : ',
    'label_password' => 'password : ',
    'label_timeout' => 'timeout : ',
    'label_source' => 'ソースからファイルをダウンロードしてください : ',
    'parsley_source' => 'ダウンロードするファイル名を入力してください',
    'label_destination' => 'ファイルのダウンロード先 : ',
    'parsley_destination' => 'ファイルのダウンロード先の名前を入力してください。 ',
    'label_metadata_select' => 'Metadata Select : ',

    'label_conv_metadata_script' => 'metadata script : ',
    'label_conv_convert_script' => 'convert script : ',
    'label_conv_import_script' => 'import script : ',
    'label_conv_data_folder' => 'data folder : ',
    'label_conv_import_destination' => 'import destination : ',
    'label_conv_unique_constraint' => 'unique constraint : ',
    'label_conv_partition_field' => 'partition field : ',
    'label_conv_convert_name' => 'convert name : ',
    'label_conv_input_name' => 'input name : ',
    'label_conv_header_rows' => 'header rows : ',
    'label_conv_data_tag' => 'data tag : ',
    'label_conv_row_validator' => 'row validator : ',

    'label_input_name' => 'name : ',
    'label_input_type' => 'type : ',
    'label_input_input_field' => 'input field : ',
    'label_input_transform_method' => 'transform method : ',
    'label_input_transform_param' => 'transform param : ',
    'label_input_table' => 'table : ',
    'label_input_from' => 'from : ',
    'label_input_to' => 'to : ',
    'label_input_media_subtype' => 'media subtype : ',
    'label_input_input_format' => 'input format : ',
    'label_input_add_missing' => 'add missing : ',
    'label_input_missing_data' => 'missing data : ',

    'tooltip_download_name' => 'ダウンロードの名前は、ページを表示するために使用されます。タイの言語に名前を付けることができます',
    'tooltip_name' => '唯一の英語名に移動を処理するためのダウンロードの名前。',
    'tooltip_description' => 'ダウンロードの詳細に関する追加説明。',
    'tooltip_agent_user' => 'ユーザー名機関は、ダウンロードするために使用します。',
    'tooltip_data_folder' => 'ディレクトリが写真から作成したJSONにダウンロードしたデータからファイルを配置するために使用されます。 (ディレクトリを設定することからパスの絶対パスであるパスの前部rdl.confファイルのセットパスからディレクトリパスになります。 rdl.conf + data folder )',
    'tooltip_download_method' => 'ダウンロードを実行するために使用され、ダウンロードプロセスを、外出先の名前。テーブルから取り出された選択オプション内のオプション。api.system_setting field name =bof.DataIntegration.dl.DownloadScript',
    'tooltip_retry_count' => '最初のデフォルトに失敗を繰り返した後、ダウンロード数は=3回は0-10の範囲でした。',
    'tooltip_archive_folder' => 'ディレクターテリーはダウンロードすることができ、生のメディアファイルを置くことで使用しました。',
    'tooltip_result_file' => 'メディアのダウンロードから生成されたJSONファイル名。どのLAST_MODIFIEDファイル名などのアーカイブフォルダとファイルの詳細が含まれています。データは、MPの鳥のサービスからダウンロードされた場合。メタデータ情報はに、デフォルト値のfilelist.jsonを指定しない場合。',
    'tooltip_crontab_setting' => 'サーバー上のcrontabファイルにタイムの仕事を設定します。',
    'tooltrip_label_host' => 'ドライバメソッドの名前は、利用可能なダウンロードします。テーブルから取り出された選択オプション内のオプション。api.system_setting field name = bof.DataIntegration.dl.DownloadDriver',
    'tooltrip_host_url' => 'URLまたはそのようhttp://thaiwater.net?timeout=10をダウンロードするために使用されるFTPの名前。または使用のftpは、以下のフォームで必要とされます。  ftp://user:password@servername (กรณีพาสเวิร์ดเป็นอักขระพิเศษจะต้องมีการทำ urlencode ก่อน เช่น # = %23 เป็นต้น
                            後に設定することによって活性化することができるパラメータ？含めて
                            1) あなたがデフォルトに接続できない場合は、ダウンロード時間を設定するためのタイムアウトは30秒です。าที
                            2) datareは鳥のサービスからのデータをダウンロードするために使用。あなたは、正規表現を使用したい名前タグJSONマッチングパターンが、状態は、このような％の5E^などでurlencode、なされる必要があるメッセージを見つける必要があります。％または$24はCPY白鳥haiipic2 SWATとして使用することができる駆動方法です。
                            3) タイでのメッセージの件名場合は、ダウンロードして電子メールの件名は、ドライバ方式のIMAPです。それはでurlencodeする前に行う必要があります。
                            4) 現在=今鳥のサービスからのデータをダウンロードするために使用される。渡すパラメータ年では、月、日、時間は今貴重で、それは現在の日付（システム日付）から撤退します。
                            5) 年= XXXX＆ヶ月= XX＆デイ= XX＆時間= XX。リターンパラメータの年、月、日、時間のための鳥のサービスからデータをダウンロードするために使用します。過去のデータ。
                            6) extypeはwebext又はwebextdataとして使用することができる駆動方法を抽出するウェブ上のデータのダウンロードのタイプを識別するために使用されます。
                            7) 風= upper_wind| upper_pressure＆スピード=5.0キロ|0.6キロ|1.5キロ。。鳥のサービスからのデータをダウンロードするために使用さ2レベルのデータをJSONはWRF-ROMモデルである：マップデータ、予測、空気の圧力と風。異なるレベル3での風の名前タグJSONデータ、空気圧及び風速を見つける必要があります。',

    'tooltip_username' => '必要なユーザー名をダウンロードする場合を取ります。',
    'tooltip_password' => '必要なパスワードをダウンロードする場合を取ります。',
    'tooltip_timeout' => '必要なユーザー名をダウンロードする場合を取ります。',
    'tooltip_source' => 'ソースからダウンロードするために使用されるファイルの名前を指定します。このようfilelist.jsonとしてファイル名拡張子を指定します。',
    'tooltip_destination' => 'ときに、ファイルのダウンロード先に成功。
                              これは、入力ファイル（入力名:)として使用されるメディアをダウンロードするためのケースではありません。
                              ダウンロードのメディアにデータセットを設定するプロセス。
                              指定しない場合、デフォルトの設定では、任意のfilelist.jsonおよび使用するためのものです。
                              データセットとステップの入力ファイル（入力名:)。 ',

    'tooltip_conv_data_folder' => 'フォルダは変換からファイルをドロップします。',
    'tooltip_conv_unique_constraint' => 'テーブルの一意のキー',
    'tooltip_conv_partition_field' => 'パーティションを分割するために使用する日付フィールドに名前を付けます。',
    'tooltip_conv_convert_name' => '変換/インポートの名前',
    'tooltip_conv_input_name' => 'ファイルのダウンロードあなたは（ダウンロードのresult_file/宛先由来）に変換するために取られる必要があります。',
    'tooltip_conv_header_rows' => 'あなたはスキップしたいテキストファイルの行数。',
    'tooltip_conv_data_tag' => 'XML / JSONタグは、値を計算するために使用されます。',
    'tooltip_conv_row_validator' => '[名前]フィールドがヌルオプションを設定するために使用されます。',

    'tooltip_input_name' => '列変換の名前',
    'tooltip_input_input_field' => '複数の列、使用は、分離あれば、入力の複数のフィル・パニッチパックディへの入力として使用されるファイルをダウンロードするには、列の名前。',
    'tooltip_input_transform_param' => '可変定',
    'tooltip_input_input_format' => 'その日のフォーマット日時を変換するには',
    'tooltip_input_missing_data' => '情報 filed missing_data ケースがあります JSON',
  ];
?>
