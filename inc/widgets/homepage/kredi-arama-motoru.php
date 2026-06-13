<?php
CSF::createWidget( 'anasayfa_kredi_arama', array(
    'title'       => 'Anasayfa (Üst) Kredi Arama Motoru',
    'classname'   => 'anasayfa-kredi-arama-motoru',
    'description' => 'Anasayfa (Üst) Kredi Arama Motoru',
    'fields' => array(
        array(
            'id' => 'ihtiyacKrediText',
            'title' => 'İhtiyaç Kredisi Açıklaması',
            'type' => 'textarea',
            'default' => 'Avantajlı faiz oranları ile ihtiyaç kredisi hesaplamak ve bankalara <b>ihtiyaç kredisi</b> başvurusunda bulunmak birtema.com\'da güvenli ve ücretsiz!'
        ),
        array(
            'id' => 'konutKrediText',
            'title' => 'Konut Kredisi Açıklaması',
            'type' => 'textarea',
            'default' => 'Avantajlı faiz oranları ile ihtiyaç kredisi hesaplamak ve bankalara <b>konut kredisi</b> başvurusunda bulunmak birtema.com\'da güvenli ve ücretsiz!'
        ),
        array(
            'id' => 'tasitKrediText',
            'title' => 'Taşıt Kredisi Açıklaması',
            'type' => 'textarea',
            'default' => 'Avantajlı faiz oranları ile ihtiyaç kredisi hesaplamak ve bankalara <b>taşıt kredisi</b> başvurusunda bulunmak birtema.com\'da güvenli ve ücretsiz!'
        ),
        array(
            'id' => 'kobiKrediText',
            'title' => 'Kobi Kredisi Açıklaması',
            'type' => 'textarea',
            'default' => 'Avantajlı faiz oranları ile ihtiyaç kredisi hesaplamak ve bankalara <b>kobi kredisi</b> başvurusunda bulunmak birtema.com\'da güvenli ve ücretsiz!'
        ),
    )
) );

if( ! function_exists( 'anasayfa_kredi_arama' ) ) {
function anasayfa_kredi_arama( $args, $instance ) {
    global $bp_options;
?>
<div class="creditCalculator" style="float: <?= $bp_options['kredi_ara_position'] ?>">
    <div class="creditCalculatorHead">
        <ul>
            <li class="ihtiyac-kredisi"><i></i><span>İhtiyaç Kredisi</span></li>
            <li class="konut-kredisi"><i></i><span>Konut Kredisi</span></li>
            <li class="tasit-kredisi"><i></i><span>Taşıt Kredisi</span></li>
            <li class="kobi-kredisi"><i></i><span>Kobi Kredisi</span></li>
        </ul>
    </div>
    <div class="clear"></div>
    <div class="creditCalculatorBox">

        <div class="calculatorContent" style="display:block">
            <form action="<?= home_url('/' . $bp_options['page_ihtiyackredisi']) ?>" method="get">

                <div class="form-group-half form-group-input">
                    <input required type="text" name="tutar" placeholder="Kredi Tutarı" class="form-control number" maxlength="7">
                    <p class="kredi_tutari_error">Kredi tutarı 500'den büyük olmalı</p>
                    <input type="hidden" name="type" value="ihtiyac"/>
                </div>
                <div class="form-group-half">
                    <select required name="vade" id="" class="calculatorSelect">
                        <?php if (wp_is_mobile()): ?>
                            <option value="" selected>Vade</option>
                        <?php else: ?>
                            <option value="" selected>Vade Seçiniz (Ay)</option>
                        <?php endif; ?>
                        <option value="3">3 (Ay)</option>
                        <option value="6">6 (Ay)</option>
                        <option value="9">9 (Ay)</option>
                        <option value="12">12 (Ay)</option>
                        <option value="18">18 (Ay)</option>
                        <option value="24">24 (Ay)</option>
                        <option value="30">30 (Ay)</option>
                        <option value="36">36 (Ay)</option>
                    </select>
                </div>
                <button class="calculatorBtn">En Ucuz Krediyi Bul</button>
                <p class="newpta">
                    <?=$instance['ihtiyacKrediText']?>
                </p>
            </form>
        </div>

        <div class="calculatorContent" style="display:none">
            <form action="<?= home_url('/' . $bp_options['page_konutkredisi']) ?>">
                <div class="form-group-half form-group-input">
                    <input required type="text" name="tutar" placeholder="Kredi Tutarı" class="form-control number" maxlength="8">
                    <p class="kredi_tutari_error">Kredi tutarı 500'den büyük olmalı</p>
                    <input type="hidden" name="type" value="konut"/>
                </div>
                <div class="form-group-half">
                    <select required name="vade" id="" class="calculatorSelect">
                        <?php if (wp_is_mobile()): ?>
                            <option value="" selected>Vade</option>
                        <?php else: ?>
                            <option value="" selected>Vade Seçiniz (Yıl)</option>
                        <?php endif; ?>
                        <option value="12">1 Yıl (12 Ay)</option>
                        <option value="24">2 Yıl (24 Ay)</option>
                        <option value="36">3 Yıl (36 Ay)</option>
                        <option value="48">4 Yıl (48 Ay)</option>
                        <option value="60">5 Yıl (60 Ay)</option>
                        <option value="72">6 Yıl (72 Ay)</option>
                        <option value="84">7 Yıl (84 Ay)</option>
                        <option value="96">8 Yıl (96 Ay)</option>
                        <option value="108">9 Yıl (108 Ay)</option>
                        <option value="120">10 Yıl (120 Ay)</option>
                        <option value="132">11 Yıl (132 Ay)</option>
                        <option value="144">12 Yıl (144 Ay)</option>
                        <option value="156">13 Yıl (156 Ay)</option>
                        <option value="168">14 Yıl (168 Ay)</option>
                        <option value="180">15 Yıl (180 Ay)</option>

                    </select>
                </div>
                <button class="calculatorBtn">En Ucuz Krediyi Bul</button>
                <p class="newpta">
                    <?=$instance['konutKrediText']?>
                </p>
            </form>
        </div>

        <div class="calculatorContent" style="display:none">
            <form action="<?= home_url('/' . $bp_options['page_tasitkredisi']) ?>">
                <div class="form-group-half form-group-input">
                    <input required type="text" name="tutar" placeholder="Kredi Tutarı" class="form-control number" maxlength="7">
                    <p class="kredi_tutari_error">Kredi tutarı 500'den büyük olmalı</p>
                    <input type="hidden" name="type" value="tasit"/>
                </div>
                <div class="form-group-half">
                    <select required name="vade" id="" class="calculatorSelect">
                        <?php if (wp_is_mobile()): ?>
                            <option value="" selected>Vade</option>
                        <?php else: ?>
                            <option value="" selected>Vade Seçiniz (Ay)</option>
                        <?php endif; ?>
                        <option value="3">3 (Ay)</option>
                        <option value="6">6 (Ay)</option>
                        <option value="9">9 (Ay)</option>
                        <option value="12">12 (Ay)</option>
                        <option value="18">18 (Ay)</option>
                        <option value="24">24 (Ay)</option>
                        <option value="30">30 (Ay)</option>
                        <option value="36">36 (Ay)</option>
                        <option value="42">42 (Ay)</option>
                        <option value="48">48 (Ay)</option>
                    </select>
                </div>
                <button class="calculatorBtn">En Ucuz Krediyi Bul</button>
                <p class="newpta">
                    <?=$instance['tasitKrediText']?>
                </p>
            </form>
        </div>

        <div class="calculatorContent" style="display:none">
            <form action="<?= home_url('/' . $bp_options['page_kobikredisi']) ?>">
                <div class="form-group-half form-group-input">
                    <input required type="text" name="tutar" placeholder="Kredi Tutarı" class="form-control number" maxlength="7">
                    <p class="kredi_tutari_error">Kredi tutarı 500'den büyük olmalı</p>
                    <input type="hidden" name="type" value="kobi"/>
                </div>
                <div class="form-group-half">
                    <select required name="vade" id="" class="calculatorSelect">
                        <?php if (wp_is_mobile()): ?>
                            <option value="" selected>Vade</option>
                        <?php else: ?>
                            <option value="" selected>Vade Seçiniz (Ay)</option>
                        <?php endif; ?>
                        <option value="3">3 (Ay)</option>
                        <option value="6">6 (Ay)</option>
                        <option value="9">9 (Ay)</option>
                        <option value="12">12 (Ay)</option>
                        <option value="18">18 (Ay)</option>
                        <option value="24">24 (Ay)</option>
                        <option value="30">30 (Ay)</option>
                        <option value="36">36 (Ay)</option>
                        <option value="42">42 (Ay)</option>
                        <option value="48">48 (Ay)</option>
                        <option value="60">60 (Ay)</option>
                    </select>
                </div>
                <button class="calculatorBtn">En Ucuz Krediyi Bul</button>
                <p class="newpta">
                    <?=$instance['kobiKrediText']?>
                </p>
            </form>
        </div>
    </div>
</div>
<?php
}
}
