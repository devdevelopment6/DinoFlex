<?php
 class Captcha { public function __construct($_1bg40latjd0raj26qwxqclub69) { $this->_i4wjxpgff2cpswych4zkggautq = $_1bg40latjd0raj26qwxqclub69; $this->_1s5vitidkbpuoo5es5m45n1nmb = "\x4c\x42\104\137\x56\103\111\x44\x5f{$_1bg40latjd0raj26qwxqclub69}"; $this->_oqxr8a3bi8xig2egjubge = "{$_1bg40latjd0raj26qwxqclub69}\137\103\141\x70\x74\143\x68\141\111\155\x61\x67\145"; $this->_0rx2v0ecwookpw74 = new LBD_CaptchaBase($_1bg40latjd0raj26qwxqclub69); $this->_1jj0i6fkkdcg8pk9lvp5ouz6r9 = $this->_0rx2v0ecwookpw74->CaptchaId; $this->_lodn2izmm2dnrtqy9kj3ccr1v7 = CaptchaConfiguration::GetSettings(); $this->_o3sopr9d2w1ph7tma4xon = $this->_lodn2izmm2dnrtqy9kj3ccr1v7->ImageTooltip; $this->_oo1egpxgyibvmo6bcswwq = $this->_lodn2izmm2dnrtqy9kj3ccr1v7->SoundEnabled; $this->_ohve77myk36mjmk49x5x78wm40 = $this->_lodn2izmm2dnrtqy9kj3ccr1v7->SoundTooltip; $this->_ogyzt4hab168nleswpob7tf5jb = $this->_lodn2izmm2dnrtqy9kj3ccr1v7->SoundIconUrl; $this->_Iwndsyar5n3hyj6wnxy6tzc4uq = $this->_lodn2izmm2dnrtqy9kj3ccr1v7->ReloadEnabled; $this->_Iaz57gfcvxxdo6c8hey24 = $this->_lodn2izmm2dnrtqy9kj3ccr1v7->ReloadTooltip; $this->_Ipolgqc09sxzyfbtq4gkt = $this->_lodn2izmm2dnrtqy9kj3ccr1v7->ReloadIconUrl; $this->_Itw7c59sr89ep8kfgn221n2ht9 = $this->_lodn2izmm2dnrtqy9kj3ccr1v7->HelpLinkEnabled; $this->_ibcmh8cseqw1b9lry0px6fufeq = $this->_lodn2izmm2dnrtqy9kj3ccr1v7->HelpLinkMode; $this->_Os8bgclc3qmhuch0yila8 = $this->_lodn2izmm2dnrtqy9kj3ccr1v7->HelpLinkUrl; $this->_ow19w2vx5yqt5qq0 = $this->_lodn2izmm2dnrtqy9kj3ccr1v7->HelpLinkText; $this->_Ov0lldv0e78zidv67bgfd6vbjy = $this->_lodn2izmm2dnrtqy9kj3ccr1v7->RemoteScriptEnabled; $this->Load(); } private $_lodn2izmm2dnrtqy9kj3ccr1v7 = null; private $_0rx2v0ecwookpw74; public function get_CaptchaBase() { return $this->_0rx2v0ecwookpw74; } private $_i4wjxpgff2cpswych4zkggautq; private $_1jj0i6fkkdcg8pk9lvp5ouz6r9; private $_i1f7n7nfi91fz6r5ohk2aq849y; public function get_UserInputId() { return $this->_i1f7n7nfi91fz6r5ohk2aq849y; } public function set_UserInputId($_O11grjc7wf0eh16ccvotz) { $this->_i1f7n7nfi91fz6r5ohk2aq849y = "$_O11grjc7wf0eh16ccvotz"; } private $_1s5vitidkbpuoo5es5m45n1nmb; protected function get_HiddenFieldId() { return $this->_1s5vitidkbpuoo5es5m45n1nmb; } private $_l5e2h4gfn5n2o71v = -255; private $_ihy7jq77grrbr3oc = -255; public function get_TabIndex() { return $this->_l5e2h4gfn5n2o71v; } public function set_TabIndex($_0x5liuxbc0dd5ltxcjkw7blvre) { $this->_l5e2h4gfn5n2o71v = (int)($_0x5liuxbc0dd5ltxcjkw7blvre); } public function get_IsTabIndexSet() { $_lu2bzq1zjia99ll366paznbcch = false; if (-255 != $this->_l5e2h4gfn5n2o71v) { $_lu2bzq1zjia99ll366paznbcch = true; } return $_lu2bzq1zjia99ll366paznbcch; } private $_o3sopr9d2w1ph7tma4xon; public function get_ImageTooltip() { return $this->_o3sopr9d2w1ph7tma4xon; } public function set_ImageTooltip($_0hmq1a1orirc0o8b71evb) { $this->_o3sopr9d2w1ph7tma4xon = (string)$_0hmq1a1orirc0o8b71evb; } private $_oo1egpxgyibvmo6bcswwq; public function get_SoundEnabled() { return $this->_oo1egpxgyibvmo6bcswwq; } public function set_SoundEnabled($_0mpvhxvdnogw4b6p) { $this->_oo1egpxgyibvmo6bcswwq = (bool)$_0mpvhxvdnogw4b6p; } private $_ohve77myk36mjmk49x5x78wm40; public function get_SoundTooltip() { return $this->_ohve77myk36mjmk49x5x78wm40; } public function set_SoundTooltip($_0eokpj530uuw7okxhk4g7mvfx9) { $this->_ohve77myk36mjmk49x5x78wm40 = (string)$_0eokpj530uuw7okxhk4g7mvfx9; } private $_ogyzt4hab168nleswpob7tf5jb; public function get_SoundIconUrl() { return $this->_ogyzt4hab168nleswpob7tf5jb; } public function set_SoundIconUrl($_1ctxkbzjep38a99ehi18loh5uc) { $this->_ogyzt4hab168nleswpob7tf5jb = (string)$_1ctxkbzjep38a99ehi18loh5uc; } private $_Iwndsyar5n3hyj6wnxy6tzc4uq; public function get_ReloadEnabled() { return $this->_Iwndsyar5n3hyj6wnxy6tzc4uq; } public function set_ReloadEnabled($_0jvzx546qhnur3zyp04td) { $this->_Iwndsyar5n3hyj6wnxy6tzc4uq = (bool)$_0jvzx546qhnur3zyp04td; } private $_Iaz57gfcvxxdo6c8hey24; public function get_ReloadTooltip() { return $this->_Iaz57gfcvxxdo6c8hey24; } public function set_ReloadTooltip($_13y4vzirj8vg02bw) { $this->_Iaz57gfcvxxdo6c8hey24 = (string) $_13y4vzirj8vg02bw; } private $_Ipolgqc09sxzyfbtq4gkt; public function get_ReloadIconUrl() { return $this->_Ipolgqc09sxzyfbtq4gkt; } public function set_ReloadIconUrl($_o2p2mnoam4er9s6fza9f6yxebm) { $this->_Ipolgqc09sxzyfbtq4gkt = (string) $_o2p2mnoam4er9s6fza9f6yxebm; } private $_Itw7c59sr89ep8kfgn221n2ht9; public function get_HelpLinkEnabled() { return $this->_Itw7c59sr89ep8kfgn221n2ht9; } private $_ibcmh8cseqw1b9lry0px6fufeq; public function get_HelpLinkMode() { return $this->_ibcmh8cseqw1b9lry0px6fufeq; } private $_Os8bgclc3qmhuch0yila8; public function get_HelpLinkUrl() { return $this->_Os8bgclc3qmhuch0yila8; } private $_ow19w2vx5yqt5qq0; public function get_HelpLinkText() { return $this->_ow19w2vx5yqt5qq0; } private $_Ov0lldv0e78zidv67bgfd6vbjy; public function get_RemoteScriptEnabled() { return $this->_Ov0lldv0e78zidv67bgfd6vbjy; } public function get_IsSolved() { return LBD_Persistence_Load("\x4c\102\x44\x5f\111\163\x53\x6f\154\x76\145\x64\x5f" . $this->_1jj0i6fkkdcg8pk9lvp5ouz6r9); } public function Reset() { LBD_Persistence_Clear("\x4c\x42\104\137\111\163\x53\157\154\166\x65\144\x5f" . $this->_1jj0i6fkkdcg8pk9lvp5ouz6r9); } private function d7uen() { $this->_Itw7c59sr89ep8kfgn221n2ht9 = LBD_HelpLinkHelper::GetHelpLinkEnabled($this->_Itw7c59sr89ep8kfgn221n2ht9); $this->_Os8bgclc3qmhuch0yila8 = LBD_HelpLinkHelper::GetHelpLinkUrl($this->_Os8bgclc3qmhuch0yila8, $this->Localization); $this->_ow19w2vx5yqt5qq0 = LBD_HelpLinkHelper::GetHelpLinktext($this->_ow19w2vx5yqt5qq0, $this->ImageWidth); } private $_O9jfkmzy3m9se5vf67xb0 = LBD_Status::Unknown; public function get_UseSmallIcons() { $_iy9wejdbufenyvbsu71ca = false; switch ($this->_O9jfkmzy3m9se5vf67xb0) { case LBD_Status::True: $_iy9wejdbufenyvbsu71ca = true; break; case LBD_Status::False: $_iy9wejdbufenyvbsu71ca = false; break; case LBD_Status::Unknown: $_iy9wejdbufenyvbsu71ca = ($this->ImageHeight < 50); break; } return $_iy9wejdbufenyvbsu71ca; } public function set_UseSmallIcons($_oaxdh2m7yndgnvi8) { if ($_oaxdh2m7yndgnvi8) { $this->_O9jfkmzy3m9se5vf67xb0 = LBD_Status::True; } else { $this->_O9jfkmzy3m9se5vf67xb0 = LBD_Status::False; } } private $_0anx20ma1nrwnrtcvgytaw3xsp = LBD_Status::Unknown; public function get_UseHorizontalIcons() { $_l45zpveze9oo33dsd5511 = false; switch ($this->_0anx20ma1nrwnrtcvgytaw3xsp) { case LBD_Status::True: $_l45zpveze9oo33dsd5511 = true; break; case LBD_Status::False: $_l45zpveze9oo33dsd5511 = false; break; case LBD_Status::Unknown: $_l45zpveze9oo33dsd5511 = ($this->ImageHeight < 40); break; } return $_l45zpveze9oo33dsd5511; } public function set_UseHorizontalIcons($_i62smofh8eoxrpjg) { if ($_i62smofh8eoxrpjg) { $this->_0anx20ma1nrwnrtcvgytaw3xsp = LBD_Status::True; } else { $this->_0anx20ma1nrwnrtcvgytaw3xsp = LBD_Status::False; } } const IconSize = 22; const SmallIconSize = 17; const IconSpacing = 2; public function get_TotalWidth() { return $this->ImageWidth + 6 + $this->get_IconsDivWidth(); } public function get_TotalHeight() { return $this->ImageHeight; } public function get_IconWidth() { if ($this->k4j15()) { if ($this->UseSmallIcons) { return 17; } else { return 22; } } else { return 22; } } public function get_IconSpaing() { return 2; } public function get_IconsDivWidth() { if ($this->UseHorizontalIcons) { return 2 * $this->get_IconWidth() + 4 * $this->get_IconSpaing(); } else { return $this->get_IconWidth() + $this->get_IconSpaing(); } } private function k4j15() { return (0 == strcmp(basename($this->_lodn2izmm2dnrtqy9kj3ccr1v7->SoundIconUrl), "\x6c\x62\144\x5f\x73\157\x75\156\144\137\151\x63\x6f\156\x2e\x67\x69\x66")) && 0 == strcmp(basename($this->_lodn2izmm2dnrtqy9kj3ccr1v7->ReloadIconUrl), "\x6c\x62\x64\x5f\162\145\154\157\141\144\137\x69\x63\157\x6e\56\x67\x69\x66"); } private function vuu7w() { if ($this->UseSmallIcons) { $this->_Ipolgqc09sxzyfbtq4gkt = CaptchaUrls::SmallReloadIconUrl(); $this->_ogyzt4hab168nleswpob7tf5jb = CaptchaUrls::SmallSoundIconUrl(); } if (!$this->CaptchaSoundAvailable) { if ($this->UseSmallIcons) { $this->_ogyzt4hab168nleswpob7tf5jb = CaptchaUrls::DisabledSmallSoundIconUrl(); } else { $this->_ogyzt4hab168nleswpob7tf5jb = CaptchaUrls::DisabledSoundIconUrl(); } $this->_ohve77myk36mjmk49x5x78wm40 = "\x3c\145\x6d\x3e\103\141\160\x74\x63\x68\x61\40\x73\157\x75\156\x64\40\x69\163\x20\145\156\x61\x62\154\x65\x64\54\x20\x62\x75\x74\x20\164\150\x65\40\x70\x72\x6f\156\165\x6e\x63\x69\x61\164\151\x6f\x6e\40\x73\157\x75\156\144\x20\160\x61\x63\x6b\141\147\x65\40\x72\145\161\165\151\162\x65\144\40\x66\x6f\162\40\164\x68\145\40\x63\165\x72\162\145\x6e\x74\40\154\x6f\x63\x61\154\145\x20\143\141\x6e\x20\x6e\x6f\x74\x20\x62\x65\x20\x66\x6f\165\x6e\144\56\x3c\57\x65\x6d\x3e\40\n\x3c\x65\155\76\x54\157\40\145\156\141\x62\154\x65\40\103\x61\x70\164\143\150\141\40\x73\157\x75\156\144\40\146\157\x72\40\164\150\x69\x73\x20\154\x6f\x63\141\154\x65\x2c\x20\x70\x6c\x65\x61\163\145\40\144\145\160\154\x6f\171\x20\x74\x68\145\x20\x61\x70\160\162\x6f\x70\162\151\141\164\145\40\x73\x6f\165\x6e\x64\x20\160\x61\143\153\141\147\145\x20\146\x72\x6f\155\40\164\x68\x65\x20\x3c\143\157\144\x65\x3e\x68\164\164\160\72\x2f\57\143\x61\160\x74\x63\150\x61\56\x63\x6f\155\57\x63\x61\x70\x74\x63\150\x61\x2d\x6c\x6f\143\141\x6c\151\x7a\141\164\151\x6f\156\163\56\x68\x74\x6d\x6c\74\x2f\x63\x6f\x64\145\76\40\x70\141\x67\145\x20\x74\157\40\x74\x68\x65\x20\74\x63\157\x64\x65\x3e\x6c\151\142\57\x62\157\164\144\145\164\x65\x63\x74\x2f\122\145\x73\x6f\x75\162\x63\x65\x73\x2f\123\x6f\x75\156\144\57\74\57\143\157\144\145\x3e\x20\146\x6f\154\x64\145\162\x20\x69\x6e\40\x74\x68\145\x20\x42\157\x74\x44\x65\164\145\143\x74\x20\x43\141\x70\164\143\150\141\40\x6c\151\142\162\141\162\x79\x20\x79\157\165\x20\141\x72\145\x20\x69\156\x63\x6c\x75\144\x69\x6e\147\40\x69\156\40\x79\157\165\162\x20\x70\141\x67\145\x2e\x20\106\157\x72\40\145\x78\141\x6d\x70\x6c\145\x2c\40\x75\x73\145\40\74\143\157\x64\145\x3e\120\x72\157\x6e\x75\156\143\151\x61\164\151\x6f\156\x5f\105\156\147\x6c\151\163\x68\x5f\x47\x42\56\142\x64\163\x70\x3c\x2f\x63\157\x64\x65\76\x20\146\157\x72\40\x42\162\151\164\151\163\x68\40\105\156\147\x6c\151\163\150\40\103\141\160\x74\143\150\x61\x20\x73\157\165\x6e\144\163\56\74\x2f\x65\155\76\40\n\74\145\155\x3e\124\x6f\x20\x64\x69\163\x61\x62\x6c\145\x20\164\x68\151\x73\x20\x77\x61\x72\156\151\x6e\147\x20\141\x6e\x64\x20\x72\145\x6d\157\x76\x65\x20\164\150\145\x20\x73\x6f\x75\156\144\40\x69\x63\157\x6e\x20\146\x6f\x72\x20\164\150\x65\x20\143\x75\162\162\x65\156\164\x20\x43\x61\x70\164\x63\150\x61\x20\154\157\x63\x61\154\145\54\x20\x73\x65\x74\40\74\x63\x6f\x64\x65\x3e\$\103\x61\x70\164\143\x68\x61\x43\x6f\x6e\146\151\147\x2d\76\x57\x61\162\156\101\142\157\165\164\115\151\163\163\151\x6e\x67\123\x6f\165\x6e\144\120\x61\x63\153\141\147\145\x73\74\x2f\143\157\144\x65\x3e\40\x74\157\x20\74\143\157\144\x65\x3e\x66\141\154\163\x65\x3c\x2f\143\x6f\144\145\x3e\x20\x69\x6e\x20\164\150\x65\40\x3c\x63\157\144\x65\x3e\x6c\151\142\x2f\142\157\x74\144\145\x74\145\x63\x74\x2f\103\141\x70\164\x63\150\141\103\x6f\x6e\x66\151\x67\56\160\150\160\74\57\143\x6f\x64\145\x3e\40\x66\x69\x6c\x65\56\x20\124\x6f\40\162\x65\x6d\x6f\166\x65\x20\164\150\x65\x20\x73\157\165\x6e\144\40\151\x63\x6f\x6e\40\x66\157\x72\x20\141\x6c\154\40\x6c\x6f\143\x61\154\145\163\54\40\x73\151\x6d\160\x6c\171\x20\x73\145\164\40\x3c\143\157\x64\145\76\$\x43\141\x70\x74\x63\150\x61\x43\157\156\146\x69\147\55\76\123\x6f\165\156\x64\x45\156\x61\142\154\x65\144\40\75\40\146\x61\154\163\145\x3b\74\x2f\143\157\144\x65\76\x2e\74\x2f\145\x6d\x3e"; } } public function get_CaptchaImageUrl() { return CaptchaUrls::ImageUrl($this); } public function get_CaptchaSoundUrl() { return CaptchaUrls::SoundUrl($this); } public function get_ScriptIncludeUrl() { return CaptchaUrls::ScriptIncludeUrl(); } private $_oqxr8a3bi8xig2egjubge; public function get_ImageClientId() { return $this->_oqxr8a3bi8xig2egjubge; } public function get_RenderIcons() { return ($this->_oo1egpxgyibvmo6bcswwq || $this->_Iwndsyar5n3hyj6wnxy6tzc4uq); } protected function Load() { $this->_0rx2v0ecwookpw74->Load(); } protected function Save() { $this->_0rx2v0ecwookpw74->Save(); } public function Validate($_oqkzfs5a92wstb91o6uj8 = null, $_lmnt8arkd2rddiqy = null) { if (!isset($_oqkzfs5a92wstb91o6uj8) && array_key_exists($this->_i1f7n7nfi91fz6r5ohk2aq849y, $_REQUEST)) { $_oqkzfs5a92wstb91o6uj8 = $_REQUEST[$this->_i1f7n7nfi91fz6r5ohk2aq849y]; $_oqkzfs5a92wstb91o6uj8 = trim($_oqkzfs5a92wstb91o6uj8); } if (!isset($_lmnt8arkd2rddiqy) && array_key_exists($this->_1s5vitidkbpuoo5es5m45n1nmb, $_REQUEST)) { $_lmnt8arkd2rddiqy = $_REQUEST[$this->_1s5vitidkbpuoo5es5m45n1nmb]; } $_035dc4btb0ye8ycl6wnuoirzkn = false; if (isset($_oqkzfs5a92wstb91o6uj8) && isset($_lmnt8arkd2rddiqy)) { $_035dc4btb0ye8ycl6wnuoirzkn = $this->_0rx2v0ecwookpw74->Validate($_oqkzfs5a92wstb91o6uj8, $_lmnt8arkd2rddiqy, LBD_ValidationAttemptOrigin::Server); } if ($_035dc4btb0ye8ycl6wnuoirzkn) { LBD_Persistence_Save("\x4c\102\x44\x5f\111\163\123\x6f\154\x76\x65\144\137" . $this->_1jj0i6fkkdcg8pk9lvp5ouz6r9, true); } else { LBD_Persistence_Clear("\114\x42\104\x5f\x49\x73\x53\x6f\154\x76\145\x64\x5f" . $this->_1jj0i6fkkdcg8pk9lvp5ouz6r9); } return $_035dc4btb0ye8ycl6wnuoirzkn; } public function AjaxValidate($_Odf9jlzo6t95ryffjs2frw2ivd = null, $_Ienozbsqj81c579qbzj55 = null) { $_Otzg2lwe07f4g30tmmfsjq38i9 = false; if (isset($_Odf9jlzo6t95ryffjs2frw2ivd) && isset($_Ienozbsqj81c579qbzj55)) { $_Otzg2lwe07f4g30tmmfsjq38i9 = $this->_0rx2v0ecwookpw74->Validate($_Odf9jlzo6t95ryffjs2frw2ivd, $_Ienozbsqj81c579qbzj55, LBD_ValidationAttemptOrigin::Client); } if ($_Otzg2lwe07f4g30tmmfsjq38i9) { LBD_Persistence_Save("\114\x42\x44\x5f\111\163\x53\x6f\154\166\145\144\x5f" . $this->_1jj0i6fkkdcg8pk9lvp5ouz6r9, true); } else { LBD_Persistence_Clear("\114\102\104\x5f\111\x73\x53\157\154\166\x65\144\137" . $this->_1jj0i6fkkdcg8pk9lvp5ouz6r9); } return $_Otzg2lwe07f4g30tmmfsjq38i9; } public function get_SoundFilename() { if (SoundFormat::WavPcm16bit8kHzMono == $this->SoundFormat) { return "\x63\x61\160\x74\143\x68\x61\x5f{$this->InstanceId}\x2e\167\x61\x76"; } else if (SoundFormat::WavPcm8bit8kHzMono == $this->SoundFormat) { return "\143\141\x70\x74\x63\150\x61\x5f{$this->InstanceId}\56\x77\141\x76"; } } public function get_CaptchaSoundAvailable() { return $this->_0rx2v0ecwookpw74->IsLocalizedPronunciationAvailable; } public function Html() { $this->siudj(); $_Oxiaf7w43kq59j20ipkhuwqvth = "\r\n\x20\x20\x3c\x64\151\166\40\x63\x6c\141\163\163\75\"\x4c\102\x44\x5f\103\x61\160\164\143\x68\x61\x44\151\166\"\x20\151\144\75\"{$this->_i4wjxpgff2cpswych4zkggautq}\137\x43\x61\x70\164\x63\150\141\104\x69\x76\"\x20\163\x74\x79\154\x65\75\"\x77\x69\144\164\x68\x3a{$this->TotalWidth}\160\x78\x3b\x20\150\145\151\147\150\x74\72{$this->TotalHeight}\160\x78\73\"\x3e\x3c\x21\x2d\x2d\r\n"; $_Oxiaf7w43kq59j20ipkhuwqvth = $this->almze($_Oxiaf7w43kq59j20ipkhuwqvth); if ($this->RenderIcons) { $_Oxiaf7w43kq59j20ipkhuwqvth .= "\40\55\55\x3e\x3c\57\x64\151\x76\x3e\x3c\41\x2d\x2d\r\n"; } else { $_Oxiaf7w43kq59j20ipkhuwqvth .= "\40\x2d\x2d\x3e\74\57\144\151\x76\76\r\n"; } $_Oxiaf7w43kq59j20ipkhuwqvth = $this->hjgpt($_Oxiaf7w43kq59j20ipkhuwqvth); $_Oxiaf7w43kq59j20ipkhuwqvth = $this->knnzp($_Oxiaf7w43kq59j20ipkhuwqvth); $_Oxiaf7w43kq59j20ipkhuwqvth = $this->nk20q($_Oxiaf7w43kq59j20ipkhuwqvth); $_Oxiaf7w43kq59j20ipkhuwqvth .= "\40\x20\x3c\x2f\144\x69\166\76\r\n"; return $_Oxiaf7w43kq59j20ipkhuwqvth; } private function siudj() { $this->Save(); if ($this->k4j15()) { $this->vuu7w(); } $this->d7uen(); } private function almze($_o9uouz8ljv1b5by7o83e2fg2ux) { $_o9uouz8ljv1b5by7o83e2fg2ux .= "\x20\55\x2d\76\x3c\x64\x69\x76\x20\x63\x6c\141\163\163\75\"\114\x42\x44\x5f\103\141\160\x74\x63\150\141\x49\x6d\141\x67\x65\x44\151\x76\"\40\151\144\x3d\"{$this->_i4wjxpgff2cpswych4zkggautq}\137\x43\x61\x70\x74\x63\150\141\x49\x6d\141\x67\145\x44\x69\x76\"\x20\x73\164\171\x6c\145\75\"\x77\x69\x64\x74\150\72{$this->ImageWidth}\x70\170\x20\41\151\x6d\160\157\162\x74\x61\x6e\164\73\x20\x68\x65\x69\147\x68\x74\72{$this->ImageHeight}\x70\170\40\x21\151\x6d\160\157\162\164\x61\156\164\73\"\76\74\41\55\55\r\n"; $this->_ihy7jq77grrbr3oc = $this->_l5e2h4gfn5n2o71v; if (!$this->_Itw7c59sr89ep8kfgn221n2ht9) { $_o9uouz8ljv1b5by7o83e2fg2ux = $this->rrw6n($_o9uouz8ljv1b5by7o83e2fg2ux); } else { switch ($this->_ibcmh8cseqw1b9lry0px6fufeq) { case HelpLinkMode::Image: $_o9uouz8ljv1b5by7o83e2fg2ux = $this->pw3is($_o9uouz8ljv1b5by7o83e2fg2ux); break; case HelpLinkMode::Text: $_o9uouz8ljv1b5by7o83e2fg2ux = $this->zjhga($_o9uouz8ljv1b5by7o83e2fg2ux); break; } } return $_o9uouz8ljv1b5by7o83e2fg2ux; } private function rrw6n($_Ige38h9kvggm9x43wkdm0) { $_Ige38h9kvggm9x43wkdm0 .= "\x20\40\x20\x2d\x2d\76\74\x69\x6d\147\40\143\154\x61\163\x73\x3d\"\x4c\102\104\137\x43\x61\160\x74\143\x68\141\x49\155\x61\x67\x65\"\x20\151\x64\75\"{$this->_oqxr8a3bi8xig2egjubge}\"\40\163\x72\x63\75\"{$this->CaptchaImageUrl}\"\x20\141\x6c\x74\75\"{$this->_o3sopr9d2w1ph7tma4xon}\"\40\57\x3e\74\x21\x2d\55\r\n"; return $_Ige38h9kvggm9x43wkdm0; } private function pw3is($_Imubg2mizqs8ut1bmiii8) { if ($this->IsTabIndexSet) { $_Imubg2mizqs8ut1bmiii8 .= "\40\x20\40\x2d\x2d\76\74\x61\40\162\x65\x6c\x3d\"\156\x6f\146\x6f\154\x6c\x6f\167\"\x20\x68\162\145\x66\x3d\"{$this->_Os8bgclc3qmhuch0yila8}\"\40\164\x69\x74\x6c\145\75\"{$this->_ow19w2vx5yqt5qq0}\"\40\164\141\x62\151\x6e\144\x65\x78\x3d\"{$this->_ihy7jq77grrbr3oc}\"\40\157\156\143\154\x69\143\x6b\75\"{$this->_i4wjxpgff2cpswych4zkggautq}\x2e\x4f\x6e\x48\145\x6c\160\114\151\156\x6b\x43\154\x69\x63\x6b\x28\x29\x3b\40\x72\x65\x74\x75\162\156\x20{$this->_i4wjxpgff2cpswych4zkggautq}\56\x46\x6f\154\154\x6f\167\110\x65\x6c\160\114\x69\156\x6b\73\"\76\74\x69\155\147\40\143\154\x61\x73\x73\75\"\114\x42\x44\x5f\x43\x61\160\x74\143\150\x61\x49\x6d\x61\147\145\"\x20\151\144\75\"{$this->_oqxr8a3bi8xig2egjubge}\"\x20\163\x72\x63\75\"{$this->CaptchaImageUrl}\"\40\141\154\164\75\"{$this->_o3sopr9d2w1ph7tma4xon}\"\40\57\76\74\57\141\76\x3c\x21\x2d\x2d\r\n"; if (-1 != $this->_ihy7jq77grrbr3oc) { $this->_ihy7jq77grrbr3oc++; } } else { $_Imubg2mizqs8ut1bmiii8 .= "\x20\x20\x20\55\55\x3e\x3c\141\x20\x72\145\x6c\x3d\"\x6e\x6f\x66\x6f\154\x6c\157\x77\"\40\150\162\x65\x66\75\"{$this->_Os8bgclc3qmhuch0yila8}\"\40\x74\151\164\154\x65\75\"{$this->_ow19w2vx5yqt5qq0}\"\x20\157\156\x63\x6c\151\x63\153\x3d\"{$this->_i4wjxpgff2cpswych4zkggautq}\56\117\156\x48\x65\154\x70\114\151\x6e\x6b\103\x6c\x69\x63\153\50\x29\73\40\162\145\x74\165\x72\156\40{$this->_i4wjxpgff2cpswych4zkggautq}\x2e\x46\x6f\154\x6c\157\x77\110\145\154\x70\114\151\x6e\153\x3b\"\x3e\x3c\x69\155\x67\40\143\154\x61\x73\163\75\"\114\x42\x44\x5f\103\x61\160\x74\143\150\x61\x49\155\141\147\x65\"\x20\x69\144\x3d\"{$this->_oqxr8a3bi8xig2egjubge}\"\x20\x73\162\x63\x3d\"{$this->CaptchaImageUrl}\"\40\141\x6c\x74\75\"{$this->_o3sopr9d2w1ph7tma4xon}\"\x20\57\x3e\74\57\141\x3e\74\x21\x2d\55\r\n"; } return $_Imubg2mizqs8ut1bmiii8; } private function zjhga($_02j2ma6tb8f8nwxr4l9h0poxpy) { $_0t2xj6gx4k6i3wd2d0pqdnj698 = $this->TotalHeight - $this->xu2aa(); $_02j2ma6tb8f8nwxr4l9h0poxpy .= "\x20\40\40\x2d\55\76\x3c\x64\x69\x76\x20\x63\154\x61\163\x73\75\"\114\x42\104\x5f\103\141\x70\164\143\150\141\111\x6d\141\x67\145\x44\x69\x76\"\x20\163\164\x79\154\145\75\"\167\151\144\x74\x68\72{$this->ImageWidth}\160\170\73\x20\x68\145\151\x67\150\164\72{$_0t2xj6gx4k6i3wd2d0pqdnj698}\x70\170\x3b\"\76\x3c\151\x6d\147\40\x63\x6c\141\163\x73\75\"\x4c\102\104\x5f\103\x61\x70\164\143\150\x61\111\x6d\141\147\x65\"\40\151\144\x3d\"{$this->_oqxr8a3bi8xig2egjubge}\"\x20\163\162\x63\75\"{$this->CaptchaImageUrl}\"\40\x61\x6c\x74\75\"{$this->_o3sopr9d2w1ph7tma4xon}\"\40\x2f\76\x3c\57\144\151\x76\76\x3c\x21\55\55\r\n"; $_046hvju64xjug5clxhvpj = $this->xu2aa(); $_onr3ndx0ctk1trkr = $_046hvju64xjug5clxhvpj - 1; if ($this->IsTabIndexSet) { $_02j2ma6tb8f8nwxr4l9h0poxpy .= "\x20\x20\40\55\55\76\74\x61\40\162\x65\154\x3d\"\x6e\157\146\x6f\154\154\x6f\x77\"\x20\150\x72\x65\146\75\"{$this->_Os8bgclc3qmhuch0yila8}\"\40\164\x61\142\x69\x6e\x64\x65\x78\75\"{$this->_ihy7jq77grrbr3oc}\"\40\164\151\x74\x6c\145\x3d\"{$this->_ow19w2vx5yqt5qq0}\"\x20\163\x74\171\154\x65\x3d\"\144\x69\x73\160\154\141\171\x3a\40\x62\154\x6f\143\x6b\40\x21\x69\x6d\160\157\x72\164\x61\156\164\73\40\x68\x65\151\147\150\164\72\x20{$_046hvju64xjug5clxhvpj}\160\x78\40\41\151\155\160\x6f\x72\164\x61\156\164\x3b\40\155\x61\x72\x67\x69\156\72\40\60\x20\x21\x69\x6d\160\157\x72\164\x61\156\164\73\x20\x70\x61\144\x64\x69\x6e\147\x3a\x20\60\40\41\151\x6d\160\x6f\162\x74\x61\x6e\x74\73\40\146\157\156\164\55\x73\x69\x7a\x65\x3a\x20{$_onr3ndx0ctk1trkr}\x70\170\x20\41\151\x6d\x70\x6f\162\164\141\x6e\x74\73\x20\x6c\x69\x6e\x65\55\x68\x65\151\147\150\164\72\x20{$_046hvju64xjug5clxhvpj}\x70\x78\40\x21\x69\x6d\x70\157\162\164\141\156\164\73\40\166\x69\163\151\x62\x69\154\x69\164\171\72\x20\166\151\x73\151\x62\154\x65\x20\41\x69\x6d\x70\157\x72\164\141\156\x74\x3b\40\x66\x6f\x6e\x74\x2d\x66\x61\x6d\x69\154\x79\72\40\x56\145\x72\x64\x61\x6e\141\x2c\40\x44\x65\x6a\x61\x56\x75\40\x53\x61\x6e\x73\x2c\40\x42\x69\x74\163\x74\162\145\141\155\40\x56\145\x72\x61\x20\x53\141\156\163\x2c\x20\x56\x65\162\x64\141\156\x61\x20\122\145\146\x2c\40\163\x61\156\163\x2d\x73\145\162\x69\x66\x20\41\151\x6d\160\157\x72\164\x61\x6e\x74\x3b\x20\x76\145\x72\164\151\143\x61\154\x2d\x61\x6c\151\147\156\x3a\x20\155\x69\144\x64\x6c\145\x20\41\151\155\160\x6f\x72\164\141\x6e\164\73\x20\164\145\x78\164\55\141\x6c\x69\x67\156\72\40\x63\x65\x6e\x74\x65\x72\40\41\151\x6d\x70\157\162\x74\x61\156\x74\x3b\x20\x74\x65\x78\x74\55\144\145\x63\157\x72\141\x74\x69\x6f\156\72\x20\x6e\157\156\145\40\41\x69\155\x70\x6f\162\164\141\156\x74\x3b\x20\x62\x61\x63\153\x67\162\x6f\165\156\144\x2d\143\x6f\154\157\x72\72\40\43\146\70\x66\x38\x66\x38\40\x21\151\155\x70\x6f\162\164\x61\156\164\x3b\x20\x63\x6f\154\157\162\72\40\43\x36\60\x36\60\66\60\x20\41\x69\x6d\x70\x6f\x72\164\141\156\x74\x3b\"\76{$this->_ow19w2vx5yqt5qq0}\74\57\x61\x3e\74\x21\55\x2d\r\n"; if (-1 != $this->_ihy7jq77grrbr3oc) { $this->_ihy7jq77grrbr3oc++; } } else { $_02j2ma6tb8f8nwxr4l9h0poxpy .= "\x20\x20\x20\x2d\55\x3e\74\141\40\162\x65\154\x3d\"\156\x6f\x66\157\154\154\157\x77\"\x20\x68\x72\x65\146\x3d\"{$this->_Os8bgclc3qmhuch0yila8}\"\x20\x74\151\x74\154\145\x3d\"{$this->_ow19w2vx5yqt5qq0}\"\x20\x73\164\x79\154\x65\x3d\"\144\151\x73\x70\x6c\x61\x79\x3a\x20\142\x6c\x6f\x63\x6b\40\x21\x69\x6d\160\157\162\x74\141\156\x74\x3b\40\150\x65\x69\x67\x68\164\x3a\40{$_046hvju64xjug5clxhvpj}\x70\x78\40\41\151\x6d\x70\157\x72\164\x61\x6e\x74\x3b\x20\x6d\141\x72\147\x69\x6e\72\x20\60\40\x21\x69\x6d\160\157\162\164\141\156\164\x3b\x20\x70\141\x64\x64\x69\x6e\x67\72\40\x30\40\41\151\x6d\160\157\162\x74\x61\x6e\x74\x3b\x20\146\x6f\156\164\x2d\x73\151\x7a\145\72\x20{$_onr3ndx0ctk1trkr}\x70\x78\40\41\151\155\160\x6f\x72\164\x61\x6e\164\x3b\40\x6c\151\156\x65\x2d\150\145\x69\147\x68\x74\72\40{$_onr3ndx0ctk1trkr}\160\170\x20\x21\x69\x6d\160\x6f\x72\164\141\x6e\164\73\x20\x76\x69\163\151\142\151\x6c\151\164\x79\x3a\x20\166\151\163\x69\x62\154\145\40\x21\151\155\x70\x6f\162\164\141\x6e\164\x3b\40\146\x6f\156\x74\x2d\146\141\155\151\x6c\171\72\40\126\x65\162\x64\141\x6e\141\x2c\x20\104\145\x6a\141\x56\x75\40\x53\x61\x6e\163\54\x20\x42\151\x74\x73\164\162\145\x61\155\x20\126\145\162\x61\40\x53\x61\x6e\163\x2c\40\126\x65\162\x64\x61\156\x61\x20\122\145\146\x2c\40\163\x61\156\x73\55\x73\145\162\x69\146\x20\x21\151\155\x70\157\162\164\141\156\164\73\x20\x76\x65\162\x74\151\x63\x61\x6c\x2d\141\154\151\x67\x6e\x3a\x20\155\x69\144\144\x6c\x65\40\41\x69\155\160\157\x72\x74\141\156\x74\73\x20\164\x65\170\x74\55\141\x6c\x69\147\156\72\40\143\x65\156\x74\x65\162\x20\41\x69\155\160\157\162\164\141\156\164\73\40\164\x65\170\x74\x2d\x64\x65\x63\x6f\x72\x61\x74\x69\157\x6e\72\40\156\157\x6e\x65\x20\41\x69\155\160\x6f\x72\164\x61\156\x74\x3b\40\x62\x61\x63\153\x67\162\x6f\x75\156\144\55\x63\x6f\x6c\x6f\x72\72\x20\x23\146\x38\x66\70\146\x38\x20\x21\x69\155\x70\x6f\162\x74\x61\156\164\x3b\x20\x63\x6f\154\x6f\162\x3a\40\43\x36\60\x36\x30\x36\60\x20\41\151\155\160\x6f\162\164\x61\x6e\164\73\"\76{$this->_ow19w2vx5yqt5qq0}\74\57\x61\x3e\x3c\41\55\x2d\r\n"; } return $_02j2ma6tb8f8nwxr4l9h0poxpy; } private function hjgpt($_Icf7pwv7lcheneawr18cf) { if ($this->RenderIcons) { $_Icf7pwv7lcheneawr18cf .= "\x20\55\55\76\x3c\144\151\166\40\143\154\x61\x73\x73\x3d\"\x4c\x42\104\137\103\141\160\164\143\150\141\111\143\x6f\156\163\x44\151\x76\"\40\151\x64\x3d\"{$this->_i4wjxpgff2cpswych4zkggautq}\x5f\103\141\160\164\x63\x68\141\x49\143\x6f\156\163\x44\x69\x76\"\x20\x73\x74\171\154\145\x3d\"\x77\151\144\164\x68\72\40{$this->IconsDivWidth}\160\x78\x20\41\x69\x6d\x70\157\x72\x74\x61\x6e\x74\73\"\x3e\74\x21\x2d\55\r\n"; if ($this->ReloadEnabled) { if ($this->IsTabIndexSet) { $_Icf7pwv7lcheneawr18cf .= "\x20\x20\x20\x2d\x2d\x3e\74\x61\40\x63\x6c\x61\x73\163\75\"\x4c\102\x44\x5f\122\x65\x6c\157\x61\144\x4c\x69\156\153\"\40\151\144\75\"{$this->_i4wjxpgff2cpswych4zkggautq}\x5f\x52\x65\x6c\157\141\144\114\151\156\153\"\x20\150\x72\145\146\x3d\"\43\"\40\164\x61\142\x69\x6e\x64\x65\170\x3d\"{$this->_ihy7jq77grrbr3oc}\"\40\x6f\x6e\x63\154\x69\143\x6b\75\"{$this->_i4wjxpgff2cpswych4zkggautq}\56\x52\145\x6c\157\141\144\111\x6d\x61\x67\x65\x28\x29\x3b\40\164\150\151\x73\56\x62\x6c\165\x72\x28\51\x3b\40\162\145\x74\x75\x72\156\40\146\141\154\x73\145\x3b\"\40\x74\151\164\154\x65\75\"{$this->_Iaz57gfcvxxdo6c8hey24}\"\76\x3c\x69\x6d\x67\40\x63\154\x61\163\x73\75\"\x4c\x42\104\x5f\122\x65\x6c\x6f\x61\144\111\143\157\x6e\"\x20\x69\144\x3d\"{$this->_i4wjxpgff2cpswych4zkggautq}\137\x52\x65\154\157\141\x64\111\x63\157\156\"\40\163\x72\x63\75\"{$this->_Ipolgqc09sxzyfbtq4gkt}\"\x20\x61\x6c\x74\75\"{$this->_Iaz57gfcvxxdo6c8hey24}\"\40\57\x3e\74\x2f\141\x3e\74\x21\55\55\r\n"; if (-1 != $this->_ihy7jq77grrbr3oc) { $this->_ihy7jq77grrbr3oc++; } } else { $_Icf7pwv7lcheneawr18cf .= "\40\40\40\x2d\55\76\74\x61\40\x63\x6c\141\x73\x73\75\"\114\x42\x44\x5f\122\x65\154\x6f\141\x64\x4c\x69\156\153\"\40\x69\x64\x3d\"{$this->_i4wjxpgff2cpswych4zkggautq}\x5f\x52\x65\x6c\x6f\141\144\114\151\156\153\"\x20\x68\162\145\x66\75\"\x23\"\x20\x6f\x6e\x63\x6c\151\x63\153\x3d\"{$this->_i4wjxpgff2cpswych4zkggautq}\56\122\145\x6c\x6f\141\x64\x49\x6d\x61\x67\145\x28\x29\73\40\x74\150\151\x73\56\x62\x6c\x75\x72\50\x29\x3b\x20\162\x65\x74\165\162\x6e\40\x66\x61\x6c\163\145\x3b\"\x20\164\151\x74\154\145\75\"{$this->_Iaz57gfcvxxdo6c8hey24}\"\x3e\x3c\151\155\147\40\143\x6c\141\163\x73\75\"\x4c\102\104\x5f\x52\145\x6c\157\141\x64\x49\143\157\x6e\"\x20\151\x64\x3d\"{$this->_i4wjxpgff2cpswych4zkggautq}\137\x52\145\x6c\x6f\141\144\111\x63\x6f\156\"\40\x73\162\143\x3d\"{$this->_Ipolgqc09sxzyfbtq4gkt}\"\x20\141\154\x74\x3d\"{$this->_Iaz57gfcvxxdo6c8hey24}\"\40\57\76\x3c\x2f\x61\76\74\x21\x2d\x2d\r\n"; } } $_0hjfzg44ilz5m7mnyxam0ry0fg = $this->CaptchaSoundUrl; if ($this->SoundEnabled) { if ($this->CaptchaSoundAvailable) { if ($this->IsTabIndexSet) { $_Icf7pwv7lcheneawr18cf .= "\x20\x20\40\55\x2d\76\x3c\141\x20\x72\x65\154\75\"\156\x6f\x66\x6f\x6c\154\157\167\"\x20\143\x6c\x61\163\x73\75\"\x4c\x42\x44\x5f\123\x6f\165\x6e\144\x4c\151\156\153\"\40\x69\144\75\"{$this->_i4wjxpgff2cpswych4zkggautq}\x5f\123\157\165\156\144\114\x69\156\x6b\"\40\150\162\x65\146\75\"{$_0hjfzg44ilz5m7mnyxam0ry0fg}\"\40\x74\141\x62\x69\156\x64\145\170\75\"{$this->_ihy7jq77grrbr3oc}\"\x20\157\156\143\154\x69\143\x6b\75\"{$this->_i4wjxpgff2cpswych4zkggautq}\56\120\154\141\171\x53\157\165\156\144\x28\x29\x3b\40\164\150\151\x73\56\142\x6c\165\162\x28\x29\73\x20\162\145\x74\x75\162\156\40\x66\141\x6c\163\145\73\"\40\164\151\164\154\145\75\"{$this->_ohve77myk36mjmk49x5x78wm40}\"\x20\164\141\x72\x67\x65\164\x3d\"\x5f\x62\154\141\x6e\x6b\"\x3e\74\x69\x6d\147\40\x63\x6c\141\163\163\x3d\"\x4c\102\104\x5f\123\x6f\165\156\144\111\x63\x6f\156\"\40\151\144\x3d\"{$this->_i4wjxpgff2cpswych4zkggautq}\x5f\123\157\165\x6e\x64\111\x63\157\156\"\40\163\x72\143\75\"{$this->_ogyzt4hab168nleswpob7tf5jb}\"\40\x61\154\x74\75\"{$this->_ohve77myk36mjmk49x5x78wm40}\"\x20\x2f\x3e\74\x2f\x61\76\74\x21\55\55\r\n"; } else { $_Icf7pwv7lcheneawr18cf .= "\40\40\40\x2d\55\x3e\74\141\40\x72\145\x6c\x3d\"\156\x6f\146\157\x6c\x6c\157\x77\"\40\143\x6c\x61\x73\163\75\"\x4c\102\104\137\x53\x6f\x75\x6e\x64\114\x69\x6e\x6b\"\40\x69\144\x3d\"{$this->_i4wjxpgff2cpswych4zkggautq}\x5f\x53\x6f\x75\156\x64\x4c\x69\x6e\x6b\"\x20\x68\162\145\x66\x3d\"{$_0hjfzg44ilz5m7mnyxam0ry0fg}\"\x20\x6f\x6e\x63\154\x69\143\153\75\"{$this->_i4wjxpgff2cpswych4zkggautq}\x2e\x50\154\x61\x79\123\157\165\156\144\x28\51\73\x20\x74\x68\151\x73\56\142\154\x75\x72\x28\51\x3b\x20\x72\145\x74\x75\162\156\x20\146\x61\154\x73\x65\x3b\"\x20\x74\151\164\154\145\75\"{$this->_ohve77myk36mjmk49x5x78wm40}\"\x20\x74\x61\x72\147\145\x74\75\"\x5f\142\x6c\141\x6e\x6b\"\76\74\x69\155\x67\40\x63\154\141\x73\163\x3d\"\114\x42\x44\x5f\123\157\x75\156\x64\111\143\x6f\x6e\"\40\x69\x64\x3d\"{$this->_i4wjxpgff2cpswych4zkggautq}\137\123\x6f\x75\x6e\x64\x49\143\157\156\"\x20\163\x72\x63\75\"{$this->_ogyzt4hab168nleswpob7tf5jb}\"\x20\141\x6c\x74\75\"{$this->_ohve77myk36mjmk49x5x78wm40}\"\40\57\76\74\x2f\141\x3e\74\x21\x2d\x2d\r\n"; } } else { $_Icf7pwv7lcheneawr18cf .= "\x20\40\40\55\x2d\x3e\x3c\141\x20\x74\141\162\x67\145\164\75\"\x5f\142\x6c\141\x6e\x6b\"\x20\143\154\141\163\x73\x3d\"\114\102\104\137\x44\151\x73\x61\142\154\x65\x64\114\151\x6e\153\"\x20\151\x64\75\"{$this->_i4wjxpgff2cpswych4zkggautq}\137\x53\x6f\x75\156\x64\x4c\x69\x6e\x6b\"\40\x68\162\x65\x66\x3d\"\x23\"\x20\164\x61\x62\x69\156\x64\145\170\75\"{$this->_ihy7jq77grrbr3oc}\"\x20\157\x6e\143\154\x69\x63\x6b\75\"\164\150\x69\x73\x2e\x62\154\165\x72\x28\x29\73\"\76\74\151\155\147\x20\143\x6c\x61\x73\x73\x3d\"\114\102\x44\x5f\x53\157\x75\156\144\111\x63\x6f\156\"\x20\151\x64\75\"{$this->_i4wjxpgff2cpswych4zkggautq}\137\x53\x6f\165\x6e\144\x49\x63\157\156\"\x20\163\x72\143\x3d\"{$this->_ogyzt4hab168nleswpob7tf5jb}\"\x20\x61\x6c\x74\x3d\"\"\x20\57\76\74\x73\x70\141\x6e\x20\163\164\171\154\x65\75\"\143\x6f\x6c\x6f\x72\x3a\162\145\x64\40\41\x69\155\x70\x6f\162\164\x61\x6e\164\x3b\"\76{$this->_ohve77myk36mjmk49x5x78wm40}\x3c\x2f\x73\160\x61\156\x3e\74\x2f\x61\x3e\74\x21\55\55\r\n"; } } if ($this->SoundEnabled) { $_Icf7pwv7lcheneawr18cf .= "\40\40\x20\x2d\x2d\x3e\74\x64\x69\166\x20\143\154\x61\163\x73\x3d\"\114\x42\104\x5f\x50\154\141\x63\x65\150\157\154\x64\145\x72\"\40\151\x64\x3d\"{$this->_i4wjxpgff2cpswych4zkggautq}\137\x41\165\x64\151\x6f\120\x6c\x61\143\x65\x68\x6f\154\x64\145\162\"\76\46\156\x62\163\160\73\74\57\144\151\166\76\74\x21\x2d\x2d\r\n"; } $_Icf7pwv7lcheneawr18cf .= "\x20\x2d\55\76\74\57\x64\151\166\x3e\r\n"; } return $_Icf7pwv7lcheneawr18cf; } private function knnzp($_ivbhypressz5czbuz1vjn) { $_o79sfmglccg7fs7287q8x = $this->_lodn2izmm2dnrtqy9kj3ccr1v7->AutoFocusInput ? "\x74\x72\x75\145" : "\146\141\x6c\163\x65"; $_lf5voyxn7rorsf78d9byr4uve9 = $this->_lodn2izmm2dnrtqy9kj3ccr1v7->AutoClearInput ? "\x74\162\165\145" : "\x66\x61\154\163\x65"; $_1lf5yqw9zq56i40l = false; if (isset($this->_lodn2izmm2dnrtqy9kj3ccr1v7->AutoLowercaseInput)) { $_1lf5yqw9zq56i40l = $this->_lodn2izmm2dnrtqy9kj3ccr1v7->AutoLowercaseInput ? "\164\162\165\145" : "\x66\x61\154\163\x65"; } else if (isset($this->_lodn2izmm2dnrtqy9kj3ccr1v7->AutoUppercaseInput)) { $_1lf5yqw9zq56i40l = $this->_lodn2izmm2dnrtqy9kj3ccr1v7->AutoUppercaseInput ? "\164\162\165\145" : "\x66\x61\154\x73\145"; } $_1mnta29jttxy1ie1mk5qu = $this->_lodn2izmm2dnrtqy9kj3ccr1v7->AutoReloadExpiredCaptchas ? "\x74\162\165\x65" : "\146\x61\x6c\163\x65"; $_I1n5025j7yd7o6md = $this->_lodn2izmm2dnrtqy9kj3ccr1v7->AutoReloadTimeout; $_1kbf1yexpqz8rhcq1uxp0 = $this->_lodn2izmm2dnrtqy9kj3ccr1v7->SoundStartDelay; $_01jo3jjmxnjw34oz = ($this->SoundRegenerationMode == SoundRegenerationMode::Limited) ? "\x74\x72\165\145" : "\146\141\154\x73\x65"; $_ivbhypressz5czbuz1vjn .= "\x20\x20\x20\x20\x3c\x73\143\162\x69\x70\x74\x20\x73\162\143\x3d\"{$this->ScriptIncludeUrl}\"\x20\164\x79\160\x65\75\"\164\x65\170\164\57\152\x61\x76\x61\163\143\162\x69\160\x74\"\76\74\57\163\143\x72\151\x70\x74\x3e\r\n"; $_ivbhypressz5czbuz1vjn .= "\x20\40\x20\40\74\163\x63\x72\151\x70\x74\x20\164\171\x70\x65\75\"\164\145\x78\164\x2f\x6a\141\x76\x61\163\143\x72\151\160\x74\"\x3e\57\x2f\x3c\x21\x5b\103\104\101\124\x41\133\r\n"; $_ivbhypressz5czbuz1vjn .= "\x20\40\x20\40\x20\x20\x42\157\164\x44\145\164\145\143\x74\56\111\x6e\151\164\x28\x27{$this->_i4wjxpgff2cpswych4zkggautq}\x27\54\x20\x27{$this->InstanceId}\x27\54\40\47{$this->_i1f7n7nfi91fz6r5ohk2aq849y}\x27\x2c\40{$_o79sfmglccg7fs7287q8x}\54\x20{$_lf5voyxn7rorsf78d9byr4uve9}\x2c\x20{$_1lf5yqw9zq56i40l}\x2c\x20{$_1mnta29jttxy1ie1mk5qu}\x2c\40{$this->CodeTimeout}\54\40{$_I1n5025j7yd7o6md}\x2c\40{$_1kbf1yexpqz8rhcq1uxp0}\54\40{$_01jo3jjmxnjw34oz}\51\x3b\r\n"; $_ivbhypressz5czbuz1vjn .= "\40\40\40\40\x2f\57\135\x5d\x3e\74\57\163\x63\x72\151\160\164\76\r\n"; $_ivbhypressz5czbuz1vjn .= "\40\40\x20\40\74\x69\156\160\x75\164\x20\164\171\160\145\75\"\150\151\x64\x64\145\156\"\40\x6e\x61\155\145\75\"{$this->_1s5vitidkbpuoo5es5m45n1nmb}\"\x20\x69\x64\x3d\"{$this->_1s5vitidkbpuoo5es5m45n1nmb}\"\x20\x76\141\154\x75\x65\x3d\"{$this->InstanceId}\"\40\x2f\76\r\n"; $_ivbhypressz5czbuz1vjn .= "\x20\40\40\x20\74\x69\x6e\160\x75\x74\x20\164\x79\160\145\x3d\"\x68\x69\x64\144\x65\156\"\x20\156\x61\155\x65\x3d\"\114\x42\104\137\x42\x61\x63\153\127\x6f\x72\153\x61\162\x6f\x75\156\x64\137{$this->_i4wjxpgff2cpswych4zkggautq}\"\x20\151\x64\75\"\x4c\x42\x44\x5f\x42\x61\143\153\127\x6f\x72\x6b\x61\x72\x6f\165\x6e\x64\x5f{$this->_i4wjxpgff2cpswych4zkggautq}\"\x20\166\141\x6c\165\145\75\"\x30\"\40\x2f\76\r\n"; return $_ivbhypressz5czbuz1vjn; } private function nk20q($_iq9dpmtz82u4z33lny7a0) { $this->_Ov0lldv0e78zidv67bgfd6vbjy = LBD_RemoteScriptHelper::GetRemoteScriptEnabled($this->_Ov0lldv0e78zidv67bgfd6vbjy); if ($this->_Ov0lldv0e78zidv67bgfd6vbjy) { $_iq9dpmtz82u4z33lny7a0 .= LBD_RemoteScriptHelper::GetRemoteScriptMarkup(); } return $_iq9dpmtz82u4z33lny7a0; } public static function IsFree() { return LBD_CaptchaBase::IsFree; } public static function GetProductInfo() { return LBD_CaptchaBase::$ProductInfo; } private function xu2aa() { return $this->HelpLinkHeight; } public function __get($_13khnpuccdcjkh2e) { if (method_exists($this->_0rx2v0ecwookpw74, ($_oynvavc2iwtbjx6gvjbg9 = "\147\145\x74\x5f".$_13khnpuccdcjkh2e))) { return $this->_0rx2v0ecwookpw74->$_oynvavc2iwtbjx6gvjbg9(); } else if (method_exists($this, ($_oynvavc2iwtbjx6gvjbg9 = "\x67\x65\x74\x5f".$_13khnpuccdcjkh2e))) { return $this->$_oynvavc2iwtbjx6gvjbg9(); } else return; } public function __isset($_Iovexlp6az85a1ky) { if (method_exists($this->_0rx2v0ecwookpw74, ($_0lgjgg44t3xu22pyajjmwh079u = "\x69\x73\163\x65\x74\x5f".$_Iovexlp6az85a1ky))) { return $this->_0rx2v0ecwookpw74->$_0lgjgg44t3xu22pyajjmwh079u(); } else if (method_exists($this, ($_0lgjgg44t3xu22pyajjmwh079u = "\151\x73\163\x65\x74\137".$_Iovexlp6az85a1ky))) { return $this->$_0lgjgg44t3xu22pyajjmwh079u(); } else return; } public function __set($_1h8tn7lrg6hjf6r9fy7uu, $_ln084yf5cbn1pf05) { if (method_exists($this->_0rx2v0ecwookpw74, ($_1nmoybpnd966otuk = "\163\145\164\x5f".$_1h8tn7lrg6hjf6r9fy7uu))) { $this->_0rx2v0ecwookpw74->$_1nmoybpnd966otuk($_ln084yf5cbn1pf05); } else if (method_exists($this, ($_1nmoybpnd966otuk = "\163\145\164\x5f".$_1h8tn7lrg6hjf6r9fy7uu))) { $this->$_1nmoybpnd966otuk($_ln084yf5cbn1pf05); } } public function __unset($_0vvnzf9ucmfc4wwa4o2z8) { if (method_exists($this->_0rx2v0ecwookpw74, ($_i81yypulpp0gb6zjpbfie = "\x75\x6e\x73\145\164\137".$_0vvnzf9ucmfc4wwa4o2z8))) { $this->_0rx2v0ecwookpw74->$_i81yypulpp0gb6zjpbfie(); } else if (method_exists($this, ($_i81yypulpp0gb6zjpbfie = "\x75\x6e\163\x65\x74\137".$_0vvnzf9ucmfc4wwa4o2z8))) { $this->$_i81yypulpp0gb6zjpbfie(); } } } ?>