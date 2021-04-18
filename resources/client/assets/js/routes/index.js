import Vue from 'vue'
import VueRouter from 'vue-router'

import ChangePassword from '../components/ChangePassword.vue'
import PermissionsIndex from '../components/cruds/Permissions/Index.vue'
import PermissionsCreate from '../components/cruds/Permissions/Create.vue'
import PermissionsShow from '../components/cruds/Permissions/Show.vue'
import PermissionsEdit from '../components/cruds/Permissions/Edit.vue'
import RolesIndex from '../components/cruds/Roles/Index.vue'
import RolesCreate from '../components/cruds/Roles/Create.vue'
import RolesShow from '../components/cruds/Roles/Show.vue'
import RolesEdit from '../components/cruds/Roles/Edit.vue'
import UsersIndex from '../components/cruds/Users/Index.vue'
import UsersCreate from '../components/cruds/Users/Create.vue'
import UsersShow from '../components/cruds/Users/Show.vue'
import UsersEdit from '../components/cruds/Users/Edit.vue'
import UsernotificationsIndex from '../components/cruds/Usernotifications/Index.vue'
import UsernotificationsCreate from '../components/cruds/Usernotifications/Create.vue'
import UsernotificationsShow from '../components/cruds/Usernotifications/Show.vue'
import UsernotificationsEdit from '../components/cruds/Usernotifications/Edit.vue'
import CountriesIndex from '../components/cruds/Countries/Index.vue'
import CountriesCreate from '../components/cruds/Countries/Create.vue'
import CountriesShow from '../components/cruds/Countries/Show.vue'
import CountriesEdit from '../components/cruds/Countries/Edit.vue'
import StatesIndex from '../components/cruds/States/Index.vue'
import StatesCreate from '../components/cruds/States/Create.vue'
import StatesShow from '../components/cruds/States/Show.vue'
import StatesEdit from '../components/cruds/States/Edit.vue'
import CitiesIndex from '../components/cruds/Cities/Index.vue'
import CitiesCreate from '../components/cruds/Cities/Create.vue'
import CitiesShow from '../components/cruds/Cities/Show.vue'
import CitiesEdit from '../components/cruds/Cities/Edit.vue'
import CountrydataIndex from '../components/cruds/Countrydata/Index.vue'
import CountrydataCreate from '../components/cruds/Countrydata/Create.vue'
import CountrydataShow from '../components/cruds/Countrydata/Show.vue'
import CountrydataEdit from '../components/cruds/Countrydata/Edit.vue'
import CitydataIndex from '../components/cruds/Citydata/Index.vue'
import CitydataCreate from '../components/cruds/Citydata/Create.vue'
import CitydataShow from '../components/cruds/Citydata/Show.vue'
import CitydataEdit from '../components/cruds/Citydata/Edit.vue'
import CountrylanguagesIndex from '../components/cruds/Countrylanguages/Index.vue'
import CountrylanguagesCreate from '../components/cruds/Countrylanguages/Create.vue'
import CountrylanguagesShow from '../components/cruds/Countrylanguages/Show.vue'
import CountrylanguagesEdit from '../components/cruds/Countrylanguages/Edit.vue'
import QuestionsIndex from '../components/cruds/Questions/Index.vue'
import QuestionsCreate from '../components/cruds/Questions/Create.vue'
import QuestionsShow from '../components/cruds/Questions/Show.vue'
import QuestionsEdit from '../components/cruds/Questions/Edit.vue'
import PersonalityquestionsIndex from '../components/cruds/Personalityquestions/Index.vue'
import PersonalityquestionsCreate from '../components/cruds/Personalityquestions/Create.vue'
import PersonalityquestionsShow from '../components/cruds/Personalityquestions/Show.vue'
import PersonalityquestionsEdit from '../components/cruds/Personalityquestions/Edit.vue'
import QuestionoptionsIndex from '../components/cruds/Questionoptions/Index.vue'
import QuestionoptionsCreate from '../components/cruds/Questionoptions/Create.vue'
import QuestionoptionsShow from '../components/cruds/Questionoptions/Show.vue'
import QuestionoptionsEdit from '../components/cruds/Questionoptions/Edit.vue'
import PersonalityoptionsIndex from '../components/cruds/Personalityoptions/Index.vue'
import PersonalityoptionsCreate from '../components/cruds/Personalityoptions/Create.vue'
import PersonalityoptionsShow from '../components/cruds/Personalityoptions/Show.vue'
import PersonalityoptionsEdit from '../components/cruds/Personalityoptions/Edit.vue'
import AnswersIndex from '../components/cruds/Answers/Index.vue'
import AnswersCreate from '../components/cruds/Answers/Create.vue'
import AnswersShow from '../components/cruds/Answers/Show.vue'
import AnswersEdit from '../components/cruds/Answers/Edit.vue'
import PersonalityanswersIndex from '../components/cruds/Personalityanswers/Index.vue'
import PersonalityanswersCreate from '../components/cruds/Personalityanswers/Create.vue'
import PersonalityanswersShow from '../components/cruds/Personalityanswers/Show.vue'
import PersonalityanswersEdit from '../components/cruds/Personalityanswers/Edit.vue'
import MessagesIndex from '../components/cruds/Messages/Index.vue'
import MessagesCreate from '../components/cruds/Messages/Create.vue'
import MessagesShow from '../components/cruds/Messages/Show.vue'
import MessagesEdit from '../components/cruds/Messages/Edit.vue'
import MessageconectionsIndex from '../components/cruds/Messageconections/Index.vue'
import MessageconectionsCreate from '../components/cruds/Messageconections/Create.vue'
import MessageconectionsShow from '../components/cruds/Messageconections/Show.vue'
import MessageconectionsEdit from '../components/cruds/Messageconections/Edit.vue'
import MessagedeletesIndex from '../components/cruds/Messagedeletes/Index.vue'
import MessagedeletesCreate from '../components/cruds/Messagedeletes/Create.vue'
import MessagedeletesShow from '../components/cruds/Messagedeletes/Show.vue'
import MessagedeletesEdit from '../components/cruds/Messagedeletes/Edit.vue'
import MessageblocksIndex from '../components/cruds/Messageblocks/Index.vue'
import MessageblocksCreate from '../components/cruds/Messageblocks/Create.vue'
import MessageblocksShow from '../components/cruds/Messageblocks/Show.vue'
import MessageblocksEdit from '../components/cruds/Messageblocks/Edit.vue'
import WhoviewmesIndex from '../components/cruds/Whoviewmes/Index.vue'
import WhoviewmesCreate from '../components/cruds/Whoviewmes/Create.vue'
import WhoviewmesShow from '../components/cruds/Whoviewmes/Show.vue'
import WhoviewmesEdit from '../components/cruds/Whoviewmes/Edit.vue'
import UsercommeetrequestsIndex from '../components/cruds/Usercommeetrequests/Index.vue'
import UsercommeetrequestsCreate from '../components/cruds/Usercommeetrequests/Create.vue'
import UsercommeetrequestsShow from '../components/cruds/Usercommeetrequests/Show.vue'
import UsercommeetrequestsEdit from '../components/cruds/Usercommeetrequests/Edit.vue'
import UsergroupmapsIndex from '../components/cruds/Usergroupmaps/Index.vue'
import UsergroupmapsCreate from '../components/cruds/Usergroupmaps/Create.vue'
import UsergroupmapsShow from '../components/cruds/Usergroupmaps/Show.vue'
import UsergroupmapsEdit from '../components/cruds/Usergroupmaps/Edit.vue'
import GroupsmembersIndex from '../components/cruds/Groupsmembers/Index.vue'
import GroupsmembersCreate from '../components/cruds/Groupsmembers/Create.vue'
import GroupsmembersShow from '../components/cruds/Groupsmembers/Show.vue'
import GroupsmembersEdit from '../components/cruds/Groupsmembers/Edit.vue'
import UsersessionsIndex from '../components/cruds/Usersessions/Index.vue'
import UsersessionsCreate from '../components/cruds/Usersessions/Create.vue'
import UsersessionsShow from '../components/cruds/Usersessions/Show.vue'
import UsersessionsEdit from '../components/cruds/Usersessions/Edit.vue'
import RedirectlinksIndex from '../components/cruds/Redirectlinks/Index.vue'
import RedirectlinksCreate from '../components/cruds/Redirectlinks/Create.vue'
import RedirectlinksShow from '../components/cruds/Redirectlinks/Show.vue'
import RedirectlinksEdit from '../components/cruds/Redirectlinks/Edit.vue'
import WeeklyhitsIndex from '../components/cruds/Weeklyhits/Index.vue'
import WeeklyhitsCreate from '../components/cruds/Weeklyhits/Create.vue'
import WeeklyhitsShow from '../components/cruds/Weeklyhits/Show.vue'
import WeeklyhitsEdit from '../components/cruds/Weeklyhits/Edit.vue'
import AstrologycalcsignsIndex from '../components/cruds/Astrologycalcsigns/Index.vue'
import AstrologycalcsignsCreate from '../components/cruds/Astrologycalcsigns/Create.vue'
import AstrologycalcsignsShow from '../components/cruds/Astrologycalcsigns/Show.vue'
import AstrologycalcsignsEdit from '../components/cruds/Astrologycalcsigns/Edit.vue'
import PaymentsIndex from '../components/cruds/Payments/Index.vue'
import PaymentsCreate from '../components/cruds/Payments/Create.vue'
import PaymentsShow from '../components/cruds/Payments/Show.vue'
import PaymentsEdit from '../components/cruds/Payments/Edit.vue'
import UserspaymentsplansIndex from '../components/cruds/Userspaymentsplans/Index.vue'
import UserspaymentsplansCreate from '../components/cruds/Userspaymentsplans/Create.vue'
import UserspaymentsplansShow from '../components/cruds/Userspaymentsplans/Show.vue'
import UserspaymentsplansEdit from '../components/cruds/Userspaymentsplans/Edit.vue'
import UservideosIndex from '../components/cruds/Uservideos/Index.vue'
import UservideosCreate from '../components/cruds/Uservideos/Create.vue'
import UservideosShow from '../components/cruds/Uservideos/Show.vue'
import UservideosEdit from '../components/cruds/Uservideos/Edit.vue'
import BlockusersIndex from '../components/cruds/Blockusers/Index.vue'
import BlockusersCreate from '../components/cruds/Blockusers/Create.vue'
import BlockusersShow from '../components/cruds/Blockusers/Show.vue'
import BlockusersEdit from '../components/cruds/Blockusers/Edit.vue'
import SubscriptionplansIndex from '../components/cruds/Subscriptionplans/Index.vue'
import SubscriptionplansCreate from '../components/cruds/Subscriptionplans/Create.vue'
import SubscriptionplansShow from '../components/cruds/Subscriptionplans/Show.vue'
import SubscriptionplansEdit from '../components/cruds/Subscriptionplans/Edit.vue'
import AstrologycalcsIndex from '../components/cruds/Astrologycalcs/Index.vue'
import AstrologycalcsCreate from '../components/cruds/Astrologycalcs/Create.vue'
import AstrologycalcsShow from '../components/cruds/Astrologycalcs/Show.vue'
import AstrologycalcsEdit from '../components/cruds/Astrologycalcs/Edit.vue'
import DashboardIndex  from  '../components/cruds/Dashboard/Index'
import DashboardIndex2  from  '../components/cruds/Dashboard/Index2'
import Notification  from  '../components/cruds/notification'
import ReportProblemIndex from '../components/cruds/ReportProblem/Index'
import ReportImageIndex from '../components/cruds/ReportImage/Index'
Vue.use(VueRouter)

const routes = [
    { path: '/dashboard', component: DashboardIndex, name: 'dashboard.index' },
    { path: '/dashboardadmin', component: DashboardIndex2, name: 'dashboard.index2' },
    { path: '/change-password', component: ChangePassword, name: 'auth.change_password' },
    { path: '/permissions', component: PermissionsIndex, name: 'permissions.index' },
    { path: '/permissions/create', component: PermissionsCreate, name: 'permissions.create' },
    { path: '/permissions/:id', component: PermissionsShow, name: 'permissions.show' },
    { path: '/permissions/:id/edit', component: PermissionsEdit, name: 'permissions.edit' },
    { path: '/roles', component: RolesIndex, name: 'roles.index' },
    { path: '/roles/create', component: RolesCreate, name: 'roles.create' },
    { path: '/roles/:id', component: RolesShow, name: 'roles.show' },
    { path: '/roles/:id/edit', component: RolesEdit, name: 'roles.edit' },
    { path: '/users', component: UsersIndex, name: 'users.index' },
    { path: '/users/create', component: UsersCreate, name: 'users.create' },
    { path: '/users/:id', component: UsersShow, name: 'users.show' },
    { path: '/users/:id/edit', component: UsersEdit, name: 'users.edit' },
    { path: '/usernotifications', component: UsernotificationsIndex, name: 'usernotifications.index' },
    { path: '/usernotifications/create', component: UsernotificationsCreate, name: 'usernotifications.create' },
    { path: '/usernotifications/:id', component: UsernotificationsShow, name: 'usernotifications.show' },
    { path: '/usernotifications/:id/edit', component: UsernotificationsEdit, name: 'usernotifications.edit' },
    { path: '/countries', component: CountriesIndex, name: 'countries.index' },
    { path: '/countries/create', component: CountriesCreate, name: 'countries.create' },
    { path: '/countries/:id', component: CountriesShow, name: 'countries.show' },
    { path: '/countries/:id/edit', component: CountriesEdit, name: 'countries.edit' },
    { path: '/states', component: StatesIndex, name: 'states.index' },
    { path: '/states/create', component: StatesCreate, name: 'states.create' },
    { path: '/states/:id', component: StatesShow, name: 'states.show' },
    { path: '/states/:id/edit', component: StatesEdit, name: 'states.edit' },
    { path: '/cities', component: CitiesIndex, name: 'cities.index' },
    { path: '/cities/create', component: CitiesCreate, name: 'cities.create' },
    { path: '/cities/:id', component: CitiesShow, name: 'cities.show' },
    { path: '/cities/:id/edit', component: CitiesEdit, name: 'cities.edit' },
    { path: '/countrydatas', component: CountrydataIndex, name: 'countrydatas.index' },
    { path: '/countrydatas/create', component: CountrydataCreate, name: 'countrydatas.create' },
    { path: '/countrydatas/:id', component: CountrydataShow, name: 'countrydatas.show' },
    { path: '/countrydatas/:id/edit', component: CountrydataEdit, name: 'countrydatas.edit' },
    { path: '/citydatas', component: CitydataIndex, name: 'citydatas.index' },
    { path: '/citydatas/create', component: CitydataCreate, name: 'citydatas.create' },
    { path: '/citydatas/:id', component: CitydataShow, name: 'citydatas.show' },
    { path: '/citydatas/:id/edit', component: CitydataEdit, name: 'citydatas.edit' },
    { path: '/countrylanguages', component: CountrylanguagesIndex, name: 'countrylanguages.index' },
    { path: '/countrylanguages/create', component: CountrylanguagesCreate, name: 'countrylanguages.create' },
    { path: '/countrylanguages/:id', component: CountrylanguagesShow, name: 'countrylanguages.show' },
    { path: '/countrylanguages/:id/edit', component: CountrylanguagesEdit, name: 'countrylanguages.edit' },
    { path: '/questions', component: QuestionsIndex, name: 'questions.index' },
    { path: '/questions/create', component: QuestionsCreate, name: 'questions.create' },
    { path: '/questions/:id', component: QuestionsShow, name: 'questions.show' },
    { path: '/questions/:id/edit', component: QuestionsEdit, name: 'questions.edit' },
    { path: '/personalityquestions', component: PersonalityquestionsIndex, name: 'personalityquestions.index' },
    { path: '/personalityquestions/create', component: PersonalityquestionsCreate, name: 'personalityquestions.create' },
    { path: '/personalityquestions/:id', component: PersonalityquestionsShow, name: 'personalityquestions.show' },
    { path: '/personalityquestions/:id/edit', component: PersonalityquestionsEdit, name: 'personalityquestions.edit' },
    { path: '/questionoptions', component: QuestionoptionsIndex, name: 'questionoptions.index' },
    { path: '/questionoptions/create', component: QuestionoptionsCreate, name: 'questionoptions.create' },
    { path: '/questionoptions/:id', component: QuestionoptionsShow, name: 'questionoptions.show' },
    { path: '/questionoptions/:id/edit', component: QuestionoptionsEdit, name: 'questionoptions.edit' },
    { path: '/personalityoptions', component: PersonalityoptionsIndex, name: 'personalityoptions.index' },
    { path: '/personalityoptions/create', component: PersonalityoptionsCreate, name: 'personalityoptions.create' },
    { path: '/personalityoptions/:id', component: PersonalityoptionsShow, name: 'personalityoptions.show' },
    { path: '/personalityoptions/:id/edit', component: PersonalityoptionsEdit, name: 'personalityoptions.edit' },
    { path: '/answers', component: AnswersIndex, name: 'answers.index' },
    { path: '/answers/create', component: AnswersCreate, name: 'answers.create' },
    { path: '/answers/:id', component: AnswersShow, name: 'answers.show' },
    { path: '/answers/:id/edit', component: AnswersEdit, name: 'answers.edit' },
    { path: '/personalityanswers', component: PersonalityanswersIndex, name: 'personalityanswers.index' },
    { path: '/personalityanswers/create', component: PersonalityanswersCreate, name: 'personalityanswers.create' },
    { path: '/personalityanswers/:id', component: PersonalityanswersShow, name: 'personalityanswers.show' },
    { path: '/personalityanswers/:id/edit', component: PersonalityanswersEdit, name: 'personalityanswers.edit' },
    { path: '/messages', component: MessagesIndex, name: 'messages.index' },
    { path: '/messages/create', component: MessagesCreate, name: 'messages.create' },
    { path: '/messages/:id', component: MessagesShow, name: 'messages.show' },
    { path: '/messages/:id/edit', component: MessagesEdit, name: 'messages.edit' },
    { path: '/messageconections', component: MessageconectionsIndex, name: 'messageconections.index' },
    { path: '/messageconections/create', component: MessageconectionsCreate, name: 'messageconections.create' },
    { path: '/messageconections/:id', component: MessageconectionsShow, name: 'messageconections.show' },
    { path: '/messageconections/:id/edit', component: MessageconectionsEdit, name: 'messageconections.edit' },
    { path: '/messagedeletes', component: MessagedeletesIndex, name: 'messagedeletes.index' },
    { path: '/messagedeletes/create', component: MessagedeletesCreate, name: 'messagedeletes.create' },
    { path: '/messagedeletes/:id', component: MessagedeletesShow, name: 'messagedeletes.show' },
    { path: '/messagedeletes/:id/edit', component: MessagedeletesEdit, name: 'messagedeletes.edit' },
    { path: '/messageblocks', component: MessageblocksIndex, name: 'messageblocks.index' },
    { path: '/messageblocks/create', component: MessageblocksCreate, name: 'messageblocks.create' },
    { path: '/messageblocks/:id', component: MessageblocksShow, name: 'messageblocks.show' },
    { path: '/messageblocks/:id/edit', component: MessageblocksEdit, name: 'messageblocks.edit' },
    { path: '/whoviewmes', component: WhoviewmesIndex, name: 'whoviewmes.index' },
    { path: '/whoviewmes/create', component: WhoviewmesCreate, name: 'whoviewmes.create' },
    { path: '/whoviewmes/:id', component: WhoviewmesShow, name: 'whoviewmes.show' },
    { path: '/whoviewmes/:id/edit', component: WhoviewmesEdit, name: 'whoviewmes.edit' },
    { path: '/usercommeetrequests', component: UsercommeetrequestsIndex, name: 'usercommeetrequests.index' },
    { path: '/usercommeetrequests/create', component: UsercommeetrequestsCreate, name: 'usercommeetrequests.create' },
    { path: '/usercommeetrequests/:id', component: UsercommeetrequestsShow, name: 'usercommeetrequests.show' },
    { path: '/usercommeetrequests/:id/edit', component: UsercommeetrequestsEdit, name: 'usercommeetrequests.edit' },
    { path: '/usergroupmaps', component: UsergroupmapsIndex, name: 'usergroupmaps.index' },
    { path: '/usergroupmaps/create', component: UsergroupmapsCreate, name: 'usergroupmaps.create' },
    { path: '/usergroupmaps/:id', component: UsergroupmapsShow, name: 'usergroupmaps.show' },
    { path: '/usergroupmaps/:id/edit', component: UsergroupmapsEdit, name: 'usergroupmaps.edit' },
    { path: '/groupsmembers', component: GroupsmembersIndex, name: 'groupsmembers.index' },
    { path: '/groupsmembers/create', component: GroupsmembersCreate, name: 'groupsmembers.create' },
    { path: '/groupsmembers/:id', component: GroupsmembersShow, name: 'groupsmembers.show' },
    { path: '/groupsmembers/:id/edit', component: GroupsmembersEdit, name: 'groupsmembers.edit' },
    { path: '/usersessions', component: UsersessionsIndex, name: 'usersessions.index' },
    { path: '/usersessions/create', component: UsersessionsCreate, name: 'usersessions.create' },
    { path: '/usersessions/:id', component: UsersessionsShow, name: 'usersessions.show' },
    { path: '/usersessions/:id/edit', component: UsersessionsEdit, name: 'usersessions.edit' },
    { path: '/redirectlinks', component: RedirectlinksIndex, name: 'redirectlinks.index' },
    { path: '/redirectlinks/create', component: RedirectlinksCreate, name: 'redirectlinks.create' },
    { path: '/redirectlinks/:id', component: RedirectlinksShow, name: 'redirectlinks.show' },
    { path: '/redirectlinks/:id/edit', component: RedirectlinksEdit, name: 'redirectlinks.edit' },
    { path: '/weeklyhits', component: WeeklyhitsIndex, name: 'weeklyhits.index' },
    { path: '/weeklyhits/create', component: WeeklyhitsCreate, name: 'weeklyhits.create' },
    { path: '/weeklyhits/:id', component: WeeklyhitsShow, name: 'weeklyhits.show' },
    { path: '/weeklyhits/:id/edit', component: WeeklyhitsEdit, name: 'weeklyhits.edit' },
    { path: '/astrologycalcsigns', component: AstrologycalcsignsIndex, name: 'astrologycalcsigns.index' },
    { path: '/astrologycalcsigns/create', component: AstrologycalcsignsCreate, name: 'astrologycalcsigns.create' },
    { path: '/astrologycalcsigns/:id', component: AstrologycalcsignsShow, name: 'astrologycalcsigns.show' },
    { path: '/astrologycalcsigns/:id/edit', component: AstrologycalcsignsEdit, name: 'astrologycalcsigns.edit' },
    { path: '/payments', component: PaymentsIndex, name: 'payments.index' },
    { path: '/payments/create', component: PaymentsCreate, name: 'payments.create' },
    { path: '/payments/:id', component: PaymentsShow, name: 'payments.show' },
    { path: '/payments/:id/edit', component: PaymentsEdit, name: 'payments.edit' },
    { path: '/userspaymentsplans', component: UserspaymentsplansIndex, name: 'userspaymentsplans.index' },
    { path: '/userspaymentsplans/create', component: UserspaymentsplansCreate, name: 'userspaymentsplans.create' },
    { path: '/userspaymentsplans/:id', component: UserspaymentsplansShow, name: 'userspaymentsplans.show' },
    { path: '/userspaymentsplans/:id/edit', component: UserspaymentsplansEdit, name: 'userspaymentsplans.edit' },
    { path: '/uservideos', component: UservideosIndex, name: 'uservideos.index' },
    { path: '/uservideos/create', component: UservideosCreate, name: 'uservideos.create' },
    { path: '/uservideos/:id', component: UservideosShow, name: 'uservideos.show' },
    { path: '/uservideos/:id/edit', component: UservideosEdit, name: 'uservideos.edit' },
    { path: '/blockusers', component: BlockusersIndex, name: 'blockusers.index' },
    { path: '/blockusers/create', component: BlockusersCreate, name: 'blockusers.create' },
    { path: '/blockusers/:id', component: BlockusersShow, name: 'blockusers.show' },
    { path: '/blockusers/:id/edit', component: BlockusersEdit, name: 'blockusers.edit' },
    { path: '/subscriptionplans', component: SubscriptionplansIndex, name: 'subscriptionplans.index' },
    { path: '/subscriptionplans/create', component: SubscriptionplansCreate, name: 'subscriptionplans.create' },
    { path: '/subscriptionplans/:id', component: SubscriptionplansShow, name: 'subscriptionplans.show' },
    { path: '/subscriptionplans/:id/edit', component: SubscriptionplansEdit, name: 'subscriptionplans.edit' },
    { path: '/astrologycalcs', component: AstrologycalcsIndex, name: 'astrologycalcs.index' },
    { path: '/astrologycalcs/create', component: AstrologycalcsCreate, name: 'astrologycalcs.create' },
    { path: '/astrologycalcs/:id', component: AstrologycalcsShow, name: 'astrologycalcs.show' },
    { path: '/astrologycalcs/:id/edit', component: AstrologycalcsEdit, name: 'astrologycalcs.edit' },
    { path: '/notification', component: Notification, name: 'notification' },
    { path: '/reportproblem', component: ReportProblemIndex, name: 'reportproblem' },
    { path: '/reportimage', component: ReportImageIndex, name: 'reportimage' },

]

export default new VueRouter({
    mode: 'history',
    base: '/',
    routes
})
