'use strict';const sirscToggleInfo = () =>{const items = document.querySelectorAll('[data-sirsc-toggle]');if (items){[].forEach.call(items,(item) =>{item.addEventListener('click',(event) =>{event.preventDefault();event.stopPropagation();const el = document.getElementById(item.dataset.sirscToggle);if (el.classList.contains('on')){el.classList.remove('on');}else{el.classList.add('on');}});});}};const sirscCancelCronTask = (hook) =>{sirscExecuteGetRequest('action=sirsc_cancel_cron_task&hook=' + hook);};const refreshLog = (type) =>{sirscExecuteGetRequest('action=sirsc_refresh_log&type=' + type,'sirsc-log-' + type);};const resetLog = (type) =>{sirscExecuteGetRequest('action=sirsc_reset_log&type=' + type,'sirsc-log-' + type);};const sirscStripslashes = (str) =>{return str.replace(/\\'/g,"'").replace(/\"/g,'"').replace(/\\\\/g,'\\').replace(/\\0/g,'\0');};function sirscExecuteGetRequest(url,target){let targetEl = document.getElementById(target);if (! targetEl){targetEl = sirscLightbox;}targetEl.classList.add('processing');fetch(sirscSettings.ajaxUrl + '?' + url,{method:'GET',mode:'cors',cache:'no-cache',credentials:'same-origin',}).then((response) =>{return response.text();}).then((data) =>{targetEl.textContent = data;targetEl.innerHTML = data;targetEl.classList.remove('processing');sirscAssessMessage();sirscAssessCallback();}).catch(() =>{sirscAssessCallback();sirscAssessMessage();targetEl.dataset.processing = 0;targetEl.classList.remove('processing');});}const sirscExecutePost = (url,callbackAction,elem,target,trigger) =>{const targetEl = document.getElementById(target);if (targetEl){if (1 == targetEl.dataset.processing || 1 == targetEl.dataset.stopped ){return;}targetEl.style.display = 'block';sirscRemoveElements(targetEl.querySelectorAll('.sirsc-error'));targetEl.dataset.processing = 1;}else{return;}const frm = document.getElementById(elem);const arg = sirscGetElementFormData(frm);arg.append('_sirsc_settings_submit',1);arg.append('sirsc_data[callback]',callbackAction);arg.append('sirsc_data[action]',url);arg.append('sirsc[is-ajax]',1);arg.append('sirsc[trigger]',trigger);arg.append('action',url);fetch(sirscSettings.ajaxUrl,{method:'POST',headers:{'Content-Type':'application/x-www-form-urlencoded;charset=UTF-8',},mode:'cors',cache:'no-cache',credentials:'same-origin',body:new URLSearchParams(arg),}).then((response) =>{return response.text();}).then((data) =>{if ('sirsc_settings_frm' !== elem){targetEl.textContent = data;targetEl.innerHTML = data;}targetEl.dataset.processing = 0;const targetCallback = document.getElementById('sirsc-data-callback');let useEval = true;if ((callbackAction === 'sirsc_ajax_regenerate_image_sizes_on_request' || callbackAction === 'sirsc_ajax_cleanup_image_sizes_on_request') && 0 != targetEl.dataset.stopped){useEval = false;}if ('sirsc-settings-reset' === trigger ||'sirsc-settings-advanced-rules' === trigger ||'sirsc[enable_debug_log]' === trigger ||'sirsc[cron_bulk_execution]' === trigger ||'sirsc[placeholders]' === trigger ||'sirsc-settings-cancel-crons' === trigger){window.location.reload();}if (targetCallback && useEval){sirscResolve(targetCallback.dataset.response);}frm.classList.remove('processing');}).catch(() =>{targetEl.dataset.processing = 0;frm.classList.remove('processing');});};const sirscAutosubmitForm = (submitter) =>{const frm = document.getElementById('sirsc_settings_frm');if (frm){frm.classList.add('processing');sirscExecutePost('sirsc_autosubmit_save','','sirsc_settings_frm','sirsc_settings_frm',submitter);}};const sirscAutosubmit = () =>{const items = document.querySelectorAll('[data-sirsc-autosubmit]');if (items){[].forEach.call(items,(item) =>{if (! item.hasAttribute('disabled')){let addEvent = 'click';if ('change' === item.dataset.sirscAutosubmit){addEvent = 'change';}item.addEventListener(addEvent,() =>{sirscAutosubmitForm(item.name);});}});}};const sirscSelectType = () =>{const item = document.querySelector('#sirsc_settings_frm #sirsc_post_type');if (item){item.addEventListener('change',() =>{const main = document.getElementById('main_settings_block');if (main){main.style.display = 'none';}window.location = sirscSettings.settting_url + '&_sirsc_post_types=' + item.value;});}};sirscToggleInfo();sirscAutosubmit();sirscSelectType();function sirscResolve(obj){if (obj){obj = sirscStripslashes(obj);const parsed = obj.split(';');if (parsed){[].forEach.call(parsed,(item) =>{if (item){const Fn = Function;/* A variable points Function to prevent some front-end compiler tools error. */return new Fn('return ' + item)();}});}}}let hasSirscLightboxOverlay = document.getElementById('sirsc-lightbox-overlay');if (! hasSirscLightboxOverlay){let sirscLightboxOverlay = document.createElement('div');document.body.appendChild(sirscLightboxOverlay);sirscLightboxOverlay.setAttribute('id','sirsc-lightbox-overlay');sirscLightboxOverlay.classList.add('sirsc-lightbox-overlay');let sirscLightboxWrap = document.createElement('div');document.body.appendChild(sirscLightboxWrap);sirscLightboxWrap.setAttribute('id','sirsc-lightbox-wrap');sirscLightboxWrap.classList.add('sirsc-lightbox-wrap');let sirscLightbox = document.createElement('div');sirscLightboxWrap.appendChild(sirscLightbox);sirscLightbox.setAttribute('id','sirsc-lightbox');sirscLightbox.classList.add('sirsc-lightbox');sirscLightbox.classList.add('sirsc-feature');}const sirscLightboxOverlay = document.getElementById('sirsc-lightbox-overlay');const sirscLightboxWrap = document.getElementById('sirsc-lightbox-wrap');const sirscLightbox = document.getElementById('sirsc-lightbox');const sirscCloseLightbox = () =>{sirscLightboxOverlay.classList.remove('on');sirscLightboxWrap.classList.remove('on');sirscLightbox.classList.remove('bulk');sirscLightbox.innerHTML = '';};const sisrcShowLightbox = () =>{sirscLightboxOverlay.classList.add('on');sirscLightboxWrap.classList.add('on');sirscLightbox.innerHTML ='<div class="sirsc_options-title">' +'<h2>&nbsp;</h2>' +'</div>' +'<div class="inside as-target">&nbsp;</div>';};const sisrcShowLightboxBulk = () =>{sirscLightbox.classList.add('bulk');sisrcShowLightbox();};const sirscRemoveElements = (elem) =>{if (typeof elem !== 'undefined'){if (elem.length>1){for (let i = 0;i < elem.length;i++){if (elem[ i ].parentNode){elem[ i ].parentNode.removeChild(elem[ i ]);}}}else{if (elem[ 0 ]){if (elem[ 0 ].parentNode){elem[ 0 ].parentNode.removeChild(elem[ 0 ]);}}else{if (elem.parentNode){elem.parentNode.removeChild(elem);}}}}};const sirscStrStr = (string,sep,before) =>{if (string.indexOf(sep)>= 0){return before? string.substr(0,string.indexOf(sep)):string.substr(string.indexOf(sep));}return false;};const sirscToggleAdon = (slug) =>{const frm = document.getElementById('sirsc-box-adon-' + slug);if (frm){frm.classList.add('processing');}};const sirscToggleProcesing = (slug) =>{const frm = document.getElementById(slug);if (frm){frm.classList.add('processing');}};const sirscToggleRowClass = (id,cl) =>{if ('row-original' === cl){const rows = document.querySelectorAll('.row-original');if (rows){[].forEach.call(rows,(item) =>{const prev = document.getElementById(item.id);if (prev){prev.classList.remove(cl);}});}}const el = document.getElementById(id);if (el){if (el.classList.contains(cl)){el.classList.remove(cl);}else{el.classList.add(cl);}}};const sirscAssessCallback = () =>{if (sirscLightbox.classList.contains('stopped')){sirscCloseLightbox();return;}const targetCallback = document.getElementById('sirsc-data-callback');if (targetCallback){sirscResolve(targetCallback.dataset.response);sirscRemoveElements(targetCallback);}const targetCallbackDelay = document.getElementById('sirsc-data-callback-delay');if (targetCallbackDelay){setTimeout(function (){sirscResolve(targetCallbackDelay.dataset.response);sirscRemoveElements(targetCallbackDelay);},sirscSettings.delay);}};const sirscAssessMessage = () =>{if (sirscLightbox.classList.contains('stopped')){sirscCloseLightbox();return;}const targetMessage = document.querySelectorAll('.sirsc-response-message');if (targetMessage){setTimeout(function (){sirscRemoveElements(targetMessage);},sirscSettings.delay);}};/* Bulk images actions. */function sirscStartRegenerateSize(start,size,cpt){if (event){if ('start' === start || 'finish' === start || 'resume' === start){if (! sirscLightboxWrap.classList.contains('on')){sisrcShowLightboxBulk();}sirscUnstopBulkAction();}}sirscExecuteGetRequest('action=sirsc_start_regenerate_size&start=' +start +'&size=' +size +'&cpt=' +cpt,'sirsc-lightbox');}function sirscStopBulkAction(){sirscLightbox.classList.add('stopped');}function sirscUnstopBulkAction(){sirscLightbox.classList.remove('stopped');}function sirscHideResumeButton(size){const btn = document.getElementById('sirsc-resume-button-' + size);if (btn){btn.classList.add('is-hidden');}}function sirscShowResumeButton(size){const btn = document.getElementById('sirsc-resume-button-' + size);if (btn){btn.classList.remove('is-hidden');}}function sirscStartCleanupSize(start,size,cpt){if (! sirscLightboxWrap.classList.contains('on')){sisrcShowLightboxBulk();}if ('start' === start || 'finish' === start){sirscUnstopBulkAction();}sirscExecuteGetRequest('action=sirsc_start_cleanup_size&start=' +start +'&size=' +size +'&cpt=' +cpt,'sirsc-lightbox');}function sirscShowCleanupButton(size){const btn = document.getElementById('sirsc-cleanup-button-' + size);if (btn){btn.classList.remove('is-hidden');}const btnc = document.getElementById('sirsc-cleanup-button-' + size + '-cron');if (btnc){btnc.classList.add('is-hidden');}}function sirscHideCleanupButton(size){const btn = document.getElementById('sirsc-cleanup-button-' + size);if (btn){btn.classList.add('is-hidden');}const btnc = document.getElementById('sirsc-cleanup-button-' + size + '-cron');if (btnc){btnc.classList.remove('is-hidden');}}function sirscShowRegenerateButton(size){const btn = document.getElementById('sirsc-wrap-regenerate-button-' + size);if (btn){btn.classList.remove('is-hidden');}const btnc = document.getElementById('sirsc-regenerate-button-' + size + '-cron');if (btnc){btnc.classList.add('is-hidden');}}function sirscHideRegenerateButton(size){const btn = document.getElementById('sirsc-wrap-regenerate-button-' + size);if (btn){btn.classList.add('is-hidden');}const btnc = document.getElementById('sirsc-regenerate-button-' + size + '-cron');if (btnc){btnc.classList.remove('is-hidden');}}function sirscShowRawButton(size){const btn = document.getElementById('sirsc-raw-cleanup-button-' + size);if (btn){btn.classList.remove('is-hidden');}const btnc = document.getElementById('sirsc-raw-cleanup-button-' + size + '-cron');if (btnc){btnc.classList.add('is-hidden');}}function sirscHideRawButton(size){const btn = document.getElementById('sirsc-raw-cleanup-button-' + size);if (btn){btn.classList.add('is-hidden');}const btnc = document.getElementById('sirsc-raw-cleanup-button-' + size + '-cron');if (btnc){btnc.classList.remove('is-hidden');}}function sirscStartRawCleanup(start,type,cpt){let go = false;if ('start' === start){if (confirm(sirscSettings.confirm_cleanup + '\n\n' +sirscSettings.time_warning + '\n' +sirscSettings.irreversible_operation )){go = true;}}else{go = true;}if (go === true){if (! sirscLightboxWrap.classList.contains('on')){sisrcShowLightboxBulk();}if ('start' === start || 'finish' === start){sirscUnstopBulkAction();}sirscExecuteGetRequest('action=sirsc_start_raw_cleanup&start=' +start +'&type=' +type +'&cpt=' +cpt,'sirsc-lightbox');}}/* Single image actions. */function sirscSingleDetails(id){if (event){event.stopPropagation();}sisrcShowLightbox();sirscExecuteGetRequest('action=sirsc_single_details&post-id=' + id,'sirsc-lightbox');}function sirscSingleRegenerate(id){if (event){event.stopPropagation();}sirscExecuteGetRequest('action=sirsc_single_regenerate&post-id=' + id + '&size=all','sirsc-buttons-wrapper-' + id);}function sirscSingleCleanup(id){if (event){event.stopPropagation();}if (confirm(sirscSettings.confirm_raw_cleanup)){sirscExecuteGetRequest('action=sirsc_single_cleanup&post-id=' + id,'sirsc-buttons-wrapper-' + id);}}function sirscSingleRegenerateSize(id,size,pos){let url = 'action=sirsc_single_regenerate&post-id=' + id;url += (typeof size != 'undefined') ? '&size=' + size:'&size=all';url += (typeof pos != 'undefined') ? '&position=' + pos:'';url += '&quality=' + sirscSizeQuality(id,size);url += '&count=' + sirscSizeCount(id,size);sirscExecuteGetRequest(url,'sirsc-single-size-info-' + id + '-' + size);}const sirscSizeCount = (id,size) =>{let count = 1;const wrap = document.getElementById('sirsc-single-size-info-' + id + '-' + size);if (wrap){count = wrap.dataset.count;}return count;};const sirscSizeQuality = (id,size) =>{let qual = 0;const elem = document.getElementById('selected_quality' + id + size);if (elem){qual = elem.value;}return qual;};function sirscShowImageSizeInfo(id,size){let count = 1;const wrap = document.getElementById('sirsc-single-size-info-' + id + '-' + size);if (wrap){count = wrap.dataset.count;}sirscExecuteGetRequest('action=sirsc_show_image_size_info&post-id=' +id +'&size=' +size +'&count=' +count,'sirsc-single-size-info-' + id + '-' + size);}function sirscCropPosition(id,size,pos){let count = 1;const wrap = document.getElementById('sirsc-single-size-info-' + id + '-' + size);if (wrap){count = wrap.dataset.count;}let qual = 0;const elem = document.getElementById('selected_quality' + id + size);if (elem){qual = elem.value;}sirscExecuteGetRequest('action=sirsc_crop_position&post-id=' +id +'&position=' +pos +'&size=' +size +'&quality=' +qual +'&count=' +count,'sirsc-single-size-info-' + id + '-' + size);}function sirscRefreshSummary(id){const wrap = document.getElementById('sirsc-extra-info-footer-' + id);if (wrap){sirscExecuteGetRequest('action=sirsc_refresh_summary&post-id=' + id,'sirsc-extra-info-footer-' + id);}const cols = document.getElementById('sirsc-column-summary-' + id);if (cols){sirscExecuteGetRequest('action=sirsc_refresh_summary&post-id=' +id +'&wrap=sirsc-column-summary-' +id,'sirsc-column-summary-' + id);}}function sirscStartDelete(id,size){sirscExecuteGetRequest('action=sirsc_start_delete&post-id=' + id + '&size=' + size,'sirsc-single-size-info-' + id + '-' + size);}function sirscStartDeleteFile(id,filename,size){sirscExecuteGetRequest('action=sirsc_start_delete_file&post-id=' +id +'&size=' +size +'&filename=' +filename,'sirsc-extra-info-footer-' + id);}function sirscRefreshSrc(id,size){const wrap = document.getElementById('idsrc' + id + size);if (wrap){let src = wrap.querySelectorAll('img');if (src[ 0 ]){src = src[ 0 ].getAttribute('src');const srcs = sirscStrStr(src,'?v=',true);const imgs = document.querySelectorAll('img[src^="' + srcs + '"]');if (imgs){for (let i = 0;i < imgs.length;i++){imgs[ i ].setAttribute('src',src);imgs[ i ].removeAttribute('srcset');}}}}}const sirscGetElementFormData = (elem) =>{const formData = new FormData(elem);return formData;};/* Reset all images sizes quality to the default one */const sirscResetAllQuality = (quality) =>{const qs = document.querySelectorAll('input.sirsc-size-quality');if (qs){qs.forEach((q) =>{q.value = quality;});sirscAutosubmitForm('reset-quality');}};const sirscTinyButtons = (id) =>{const string ='<div id="sirsc-buttons-wrapper-' +id +'" class="sirsc-feature as-target sirsc-buttons tiny"><div class="button-primary" onclick="sirscSingleDetails(\'' +id +'\')" title="' +sirscSettings.button_options + '"><div class="dashicons dashicons-format-gallery"></div>' +sirscSettings.button_details + '</div><div class="button-primary" onclick="sirscSingleRegenerate(\'' +id +'\')" title="' +sirscSettings.button_regenerate + '"><div class="dashicons dashicons-update"></div>' +sirscSettings.button_regenerate + '</div></div>';return string;};const initWooGallery = () =>{document.addEventListener('DOMContentLoaded',function(){const sirscWooGalWrap = document.getElementById('product_images_container');if (sirscWooGalWrap){const sirscWooGal = document.getElementById('product_image_gallery');let sirscWooGalIds = sirscWooGal.value;document.body.addEventListener('DOMSubtreeModified',function (e){if (e.target &&e.target.classList[ 0 ] === 'media-sidebar'){if (sirscWooGalIds !== sirscWooGal.value){const ids1 = sirscWooGalIds.split(',');const ids2 = sirscWooGal.value.split(',');if (ids2.length){for (let i = 0;i < ids2.length;i++){if (! ids1.includes(ids2[ i ])){const imgLi = sirscWooGalWrap.querySelectorAll('[data-attachment_id="' +ids2[ i ] +'"]');if (imgLi[ 0 ]){imgLi[ 0 ].innerHTML =imgLi[ 0 ].innerHTML +sirscTinyButtons(ids2[ i ]);}}}}sirscWooGalIds = sirscWooGal.value;}}});}});};initWooGallery();