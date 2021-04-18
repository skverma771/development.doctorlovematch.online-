import Vue from 'vue'
import Vuex from 'vuex'
import Alert from './modules/alert'
import ChangePassword from './modules/change_password'
import Rules from './modules/rules'
import PermissionsIndex from './modules/Permissions'
import PermissionsSingle from './modules/Permissions/single'
import RolesIndex from './modules/Roles'
import RolesSingle from './modules/Roles/single'
import UsersIndex from './modules/Users'
import UsersSingle from './modules/Users/single'
import UsernotificationsIndex from './modules/Usernotifications'
import UsernotificationsSingle from './modules/Usernotifications/single'
import CountriesIndex from './modules/Countries'
import CountriesSingle from './modules/Countries/single'
import StatesIndex from './modules/States'
import StatesSingle from './modules/States/single'
import CitiesIndex from './modules/Cities'
import CitiesSingle from './modules/Cities/single'
import CountrydataIndex from './modules/Countrydata'
import CountrydataSingle from './modules/Countrydata/single'
import CitydataIndex from './modules/Citydata'
import CitydataSingle from './modules/Citydata/single'
import CountrylanguagesIndex from './modules/Countrylanguages'
import CountrylanguagesSingle from './modules/Countrylanguages/single'
import QuestionsIndex from './modules/Questions'
import QuestionsSingle from './modules/Questions/single'
import PersonalityquestionsIndex from './modules/Personalityquestions'
import PersonalityquestionsSingle from './modules/Personalityquestions/single'
import QuestionoptionsIndex from './modules/Questionoptions'
import QuestionoptionsSingle from './modules/Questionoptions/single'
import PersonalityoptionsIndex from './modules/Personalityoptions'
import PersonalityoptionsSingle from './modules/Personalityoptions/single'
import AnswersIndex from './modules/Answers'
import AnswersSingle from './modules/Answers/single'
import PersonalityanswersIndex from './modules/Personalityanswers'
import PersonalityanswersSingle from './modules/Personalityanswers/single'
import MessagesIndex from './modules/Messages'
import MessagesSingle from './modules/Messages/single'
import MessageconectionsIndex from './modules/Messageconections'
import MessageconectionsSingle from './modules/Messageconections/single'
import MessagedeletesIndex from './modules/Messagedeletes'
import MessagedeletesSingle from './modules/Messagedeletes/single'
import MessageblocksIndex from './modules/Messageblocks'
import MessageblocksSingle from './modules/Messageblocks/single'
import WhoviewmesIndex from './modules/Whoviewmes'
import WhoviewmesSingle from './modules/Whoviewmes/single'
import UsercommeetrequestsIndex from './modules/Usercommeetrequests'
import UsercommeetrequestsSingle from './modules/Usercommeetrequests/single'
import UsergroupmapsIndex from './modules/Usergroupmaps'
import UsergroupmapsSingle from './modules/Usergroupmaps/single'
import GroupsmembersIndex from './modules/Groupsmembers'
import GroupsmembersSingle from './modules/Groupsmembers/single'
import UsersessionsIndex from './modules/Usersessions'
import UsersessionsSingle from './modules/Usersessions/single'
import RedirectlinksIndex from './modules/Redirectlinks'
import RedirectlinksSingle from './modules/Redirectlinks/single'
import WeeklyhitsIndex from './modules/Weeklyhits'
import WeeklyhitsSingle from './modules/Weeklyhits/single'
import AstrologycalcsignsIndex from './modules/Astrologycalcsigns'
import AstrologycalcsignsSingle from './modules/Astrologycalcsigns/single'
import PaymentsIndex from './modules/Payments'
import PaymentsSingle from './modules/Payments/single'
import UserspaymentsplansIndex from './modules/Userspaymentsplans'
import UserspaymentsplansSingle from './modules/Userspaymentsplans/single'
import UservideosIndex from './modules/Uservideos'
import UservideosSingle from './modules/Uservideos/single'
import BlockusersIndex from './modules/Blockusers'
import BlockusersSingle from './modules/Blockusers/single'
import SubscriptionplansIndex from './modules/Subscriptionplans'
import SubscriptionplansSingle from './modules/Subscriptionplans/single'
import AstrologycalcsIndex from './modules/Astrologycalcs'
import AstrologycalcsSingle from './modules/Astrologycalcs/single'
import ReportProblemIndex from './modules/ReportProblem'
import ReportImageIndex from './modules/ReportImage'
Vue.use(Vuex)

const debug = process.env.NODE_ENV !== 'production'

export default new Vuex.Store({
    modules: {
        Alert,
        ChangePassword,
        Rules,
        PermissionsIndex,
        PermissionsSingle,
        RolesIndex,
        RolesSingle,
        UsersIndex,
        UsersSingle,
        UsernotificationsIndex,
        UsernotificationsSingle,
        CountriesIndex,
        CountriesSingle,
        StatesIndex,
        StatesSingle,
        CitiesIndex,
        CitiesSingle,
        CountrydataIndex,
        CountrydataSingle,
        CitydataIndex,
        CitydataSingle,
        CountrylanguagesIndex,
        CountrylanguagesSingle,
        QuestionsIndex,
        QuestionsSingle,
        PersonalityquestionsIndex,
        PersonalityquestionsSingle,
        QuestionoptionsIndex,
        QuestionoptionsSingle,
        PersonalityoptionsIndex,
        PersonalityoptionsSingle,
        AnswersIndex,
        AnswersSingle,
        PersonalityanswersIndex,
        PersonalityanswersSingle,
        MessagesIndex,
        MessagesSingle,
        MessageconectionsIndex,
        MessageconectionsSingle,
        MessagedeletesIndex,
        MessagedeletesSingle,
        MessageblocksIndex,
        MessageblocksSingle,
        WhoviewmesIndex,
        WhoviewmesSingle,
        UsercommeetrequestsIndex,
        UsercommeetrequestsSingle,
        UsergroupmapsIndex,
        UsergroupmapsSingle,
        GroupsmembersIndex,
        GroupsmembersSingle,
        UsersessionsIndex,
        UsersessionsSingle,
        RedirectlinksIndex,
        RedirectlinksSingle,
        WeeklyhitsIndex,
        WeeklyhitsSingle,
        AstrologycalcsignsIndex,
        AstrologycalcsignsSingle,
        PaymentsIndex,
        PaymentsSingle,
        UserspaymentsplansIndex,
        UserspaymentsplansSingle,
        UservideosIndex,
        UservideosSingle,
        BlockusersIndex,
        BlockusersSingle,
        SubscriptionplansIndex,
        SubscriptionplansSingle,
        AstrologycalcsIndex,
        AstrologycalcsSingle,
        ReportImageIndex,
        ReportProblemIndex
    },
    strict: debug,
})
