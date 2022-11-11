
<div class="chat-wrapper d-lg-flex gap-1 mx-n4 mt-n4 p-1">
    <div class="chat-leftsidebar border">
        <div class="px-4 pt-4 mb-3">
            <div class="d-flex align-items-start">
                <div class="flex-grow-1">
                    <h5 class="mb-4">Chat en vivo</h5>
                </div>
                <div class="flex-shrink-0">

                </div>
            </div>

        </div> <!-- .p-4 -->

        <ul class="nav nav-tabs nav-tabs-custom nav-success nav-justified" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" data-bs-toggle="tab" href="#chats" role="tab" aria-selected="true">
                    Chats
                </a>
            </li>
        </ul>

        <div class="tab-content text-muted">
            <div class="tab-pane active" id="chats" role="tabpanel">
                <div class="chat-room-list pt-3" data-simplebar="init">
                    <div class="simplebar-wrapper" style="margin: -16px 0px 0px;"><div class="simplebar-height-auto-observer-wrapper">
                        <div class="simplebar-height-auto-observer"></div>
                    </div>
                    <div class="simplebar-mask">
                        <div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: auto; overflow: hidden scroll;"><div class="simplebar-content" style="padding: 16px 0px 0px;">
                     <div class="d-flex align-items-center px-4 mb-2">
                        <div class="flex-grow-1">
                            <h4 class="mb-0 fs-11 text-muted text-uppercase">Directorio de mensajes</h4>
                        </div>
                    </div>

                    <div class="chat-message-list">
                      <ul class="list-unstyled chat-list chat-user-list" id="userList">

                      @foreach ($usuarios as $element)
                      @if($element->id !== auth()->id())
                        @php
                         $not_seen= App\Models\Message::where('user_id',$element->id)->where('receiver_id',auth()->id())->where('is_seen',false)->get() ?? null

                         @endphp
                            <li id="contact-id-2" data-name="direct-message" class="">
                              <a wire:click="getUser({{$element->id}})" href="#" class="unread-msg-user">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 chat-user-img online align-self-center me-2 ms-0">
                                    <div class="avatar-xxs">
                                        <img src="/images/perfil/profile-2398782_1280.png" class="rounded-circle img-fluid userprofile" alt="">
                                        @if ($element->status == 1)
                                           <span class="user-status"></span>
                                         @else
                                            <span class="user-status-offline"></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="flex-grow-1 overflow-hidden">
                                    <p class="text-truncate mb-0">{{ $element->name.' '.$element->lastname }}</p>
                                </div>
                                <div class="ms-auto">
                                   @if(filled($not_seen))
                                       <div class="ms-auto"><span class="badge bg-danger rounded p-1">{{ $not_seen->count()}} </span></div>
                            @endif
                              </div>
                          </div>
                      </a>
                      </li>
                      @endif
                      @endforeach
                  </ul>
                </div>

                    <!-- End chat-message-list -->
                </div></div></div></div><div class="simplebar-placeholder" style="width: auto; height: 652px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 25px; display: block; transform: translate3d(0px, 0px, 0px);"></div></div></div>
            </div>

        </div>
        <!-- end tab contact -->
    </div>
    <!-- end chat leftsidebar -->
    <!-- Start User chat -->
    <div class="user-chat w-100 overflow-hidden border ">

        <div class="chat-content d-lg-flex">
            <!-- start chat conversation section -->
            <div class="w-100 overflow-hidden position-relative">
                <!-- conversation user -->
                <div class="position-relative">


                    <div class="position-relative " id="users-chat" style="display: block;
                      background-image: url('/assets/images/galaxy/img-5.png'); /* The image used */

                       ">
                        <div class="p-3 user-chat-topbar">
                            <div class="row align-items-center">
                                <div class="col-sm-4 col-8">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 d-block d-lg-none me-3">
                                            <a href="javascript: void(0);" class="user-chat-remove fs-18 p-1"><i class="ri-arrow-left-s-line align-bottom"></i></a>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 chat-user-img online user-own-img align-self-center me-3 ms-0">
                                                @if(isset($sender))
                                                    @if ($sender->status == true)
                                                        <img src="assets/images/users/avatar-2.jpg" class="rounded-circle avatar-xs" alt="">
                                                    <span class="user-status"></span>
                                                    @else
                                                     <img src="/images/perfil/profile-2398782_1280.png" class="rounded-circle avatar-xs" alt="">
                                                    <span class="user-status-offline"></span>
                                                    @endif
                                                @endif
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <h5 class="text-truncate mb-0 fs-16"><a class="text-reset username" data-bs-toggle="offcanvas" href="#userProfileCanvasExample" aria-controls="userProfileCanvasExample">
                                                        @if(isset($sender)){{$sender->name.' '.$sender->lastname}}   @endif
                                                    </a></h5>
                                                    <p class="text-truncate text-muted fs-14 mb-0 userStatus">
                                                          @if(isset($sender))
                                                           @if ($sender->status == true)
                                                               <span>En línea</span>
                                                            @else
                                                              <span>Desconectado</span>
                                                           @endif
                                                         @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-8 col-4">
                                    <ul class="list-inline user-chat-nav text-end mb-0">
                                        <li class="list-inline-item m-0">
                                            <div class="dropdown">
                                                <button class="btn btn-ghost-secondary btn-icon" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search icon-sm"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                                </button>
                                                <div class="dropdown-menu p-0 dropdown-menu-end dropdown-menu-lg">
                                                    <div class="p-2">

                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="list-inline-item d-none d-lg-inline-block m-0">
                                            <button type="button" class="btn btn-ghost-secondary btn-icon" >
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info icon-sm"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                                            </button>
                                        </li>

                                        <li class="list-inline-item m-0">
                                            <div class="dropdown">
                                                <button class="btn btn-ghost-secondary btn-icon" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical icon-sm"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end">

                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                        <!-- end chat user head -->
                        <div class="chat-conversation   p-3 p-lg-4" id="chat-conversation" data-simplebar="init"><div class="simplebar-wrapper" style="margin: -24px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: auto; overflow: hidden scroll;"><div class="simplebar-content" style="padding: 24px;">
                            <div id="elmLoader"></div>
                            <ul class="list-unstyled chat-conversation-list message-box" wire:poll="mountdata" id="users-conversation">
                                @if(filled($allmessages))
                                  @foreach($allmessages as $mgs)
                                  <li class="single-message @if($mgs->user_id == auth()->id()) right @else left @endif " id="2">
                                    <div class="conversation-list"><div class="user-chat-content"><div class="ctext-wrap"><div class="ctext-wrap-content" id="2"><p class="mb-0 ctext-content">{{ $mgs->message }}</p></div><div class="dropdown align-self-start message-box-drop">


                                    </div>
                                </div>
                                        <div class="conversation-name">
                                            <span class="d-none name">{{$mgs->user->name}}</span>
                                            <small class="text-muted time">Enviado <em>{{$mgs->created_at->diffForHumans()}}</em></small>
                                            <span class="text-success check-message-icon">
                                            @if ($mgs->is_seen)
                                               <i class="bx bx-check-double"></i>
                                             @else
                                             <i class="mdi mdi-check"></i>
                                            @endif

                                        </span>
                                        </div>
                                   </div>
                                 </div>
                            </li>
                          @endforeach
                         @endif
                        </ul>
                            <!-- end chat-conversation-list -->
                        </div></div></div></div><div class="simplebar-placeholder" style="width: auto; height: 652px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 25px; display: block; transform: translate3d(0px, 7px, 0px);"></div></div></div>
                        <div class="alert alert-warning alert-dismissible copyclipboard-alert px-4 fade show " id="copyClipBoard" role="alert">
                            Message copied
                        </div>
                    </div>
                    <!-- end chat-conversation -->

                    <div class="chat-input-section p-3 p-lg-4">

                       <form wire:submit.prevent="SendMessage">
                            <div class="row g-0 align-items-center">
                               <div class="card-footer">
                                    @if(!isset($sender))
                                    <div class="row">
                                        <div class="col-md-8">
                                                <input
                                                class="form-control input shadow-none w-100 d-inline-block"
                                                placeholder="Tipea el mensaje" disabled>
                                        </div>
                                        <div class="col-md-4">
                                                <button type="submit"
                                                class="btn btn-success d-inline-block w-100" disabled>
                                                <i class="mdi mdi-send" ></i> Enviar</button>
                                        </div>
                                    </div>
                                   @else
                                  <div class="row">
                                        <div class="col-md-8">
                                            <input wire:model="message" type="text" class="form-control" id="message" placeholder="Tipea el mensaje">@error('message') <span class="error text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <button type="submit"
                                            class="btn btn-primary d-inline-block w-100">
                                            <i class="mdi mdi-send"></i> Enviar</button>
                                        </div>
                                    </div>
                                @endif

                            </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end chat-wrapper -->

