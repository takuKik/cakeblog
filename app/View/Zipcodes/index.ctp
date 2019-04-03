<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="/js/zipcodeSearch.js"></script>
<div class="container pb-2">
    <div>
        <h3 class="font-weight-bold">CSVファイルのアップロード</h3>

        <?php echo $this->Form->create('Csv', array(
            'type'    => 'file',
            'class'   => 'mt-3',
        ));?>
        <div class="form-group bg-white px-3 py-4">
            <div class='d-flex align-items-center'>
                <?php
                echo $this->Form->input('file',
                array(
                    'type'     => 'file',
                    'label'    => '',
                    'class'    => 'input-file cur-po',
                    'multiple' => true,
                    'id'       => '',
                    'div'      => false,
                ));
                ?>
            </div>

            <?php echo $this->Form->submit('アップロードする', array(
                'div'    => false,
                'escape' => false,
                'class'  => 'btn btn-fb--green mt-4 pl-4 pr-4',
            ))?>
            <span id="progress">0%</span>
        </div>
    </div>
    <div class="form-group">
        <div class="well">
            <p>郵便番号の検索<input type="text" id="zipcode" value="" maxlength="7" title="郵便番号検索">
                <input type="button" id="search_btn" value="検索">
                ※7桁の半角数字で入力</p>
                <p>検索結果
                    <select id="zip_result"></select>
                    <input type="button" id="select_btn" value="入力">
                </p>
            </div>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('住所',array("id"=>"select_result")); ?>
        </div>

    </form>
    
</div>
</div>
</div>
