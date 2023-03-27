//export const formSteps = { "form":[
export const formSteps = [
  {
    step: 1,
    heading: 'Member details',
    items: [
      [
        {
          type: 'txt',
          name: 'memberName',
          label: 'Member name',
          id: 'memberName',
          validationType: 'string',
          validations: [
            {
              type: 'required',
              params: ['this field is required'],
            },
          ],
        },
        {
          type: 'txt',
          name: 'membershipNumber',
          label: 'Membership number',
          id: 'membershipNumber',
        },
      ],
      [
        {
          type: 'txt',
          name: 'claimAssesmentNumber',
          label: 'Claim assessment number',
          id: 'claimAssesmentNumber',
        },
        {
          type: 'txt',
          name: 'claimNumber',
          label: 'Claim number',
          id: 'claimNumber',
        },
      ],
      [
        {
          type: 'txt',
          name: 'workpacketNumber',
          label: 'Workpacket number',
          id: 'workpacketNumber',
        },
      ],
    ],
  },
  {
    step: 2,
    heading: 'Provider details',
    items: [
      [
        {
          type: 'txt',
          name: 'providerNumber',
          label: 'Provider number',
          id: 'providerNumber',
        },
        {
          type: 'txt',
          name: 'specialistName',
          label: 'Specialist name',
          id: 'specialistName',
        },
      ],
      [
        {
          type: 'txt',
          name: 'specialistCapCode',
          label: 'Specialist CAP code',
          id: 'specialistCapCode',
        },
        {
          type: 'txt',
          name: 'hospitalName',
          label: 'Hospital name',
          id: 'hospitalName',
        },
      ],
      [
        {
          type: 'txt',
          name: 'hospitalCode',
          label: 'Hospital code',
          id: 'hospitalCode',
          validationType: 'string',
          validations: [
            {
              type: 'required',
              params: ['this field is required'],
            },
          ],
        },
        {
          type: 'textArea',
          name: 'relatedProviders',
          label: 'Related provider names and numbers',
          id: 'relatedProviders',
        },
      ],
      [
        {
          type: 'txt',
          name: 'anaesthetistName',
          label: 'Anaesthetist name',
          id: 'anaesthetistName',
        },
        {
          type: 'txt',
          name: 'anaesthetistSpecCode',
          label: 'Anaesthetist specialist code',
          id: 'anaesthetistSpecCode',
        },
      ],
      [
        {
          type: 'txt',
          name: 'contactWho',
          label: 'Who do you want us to contact?',
          labelHelper:
            'Name of person and who they are e.g. member/secretary/hospital contact',
          id: 'contactWho',
        },
        {
          type: 'txt',
          name: 'relevantContact',
          label: 'Relevant email/telephone number',
          id: 'relevantContact',
        },
      ],
    ],
  },
  {
    step: 3,
    heading: 'Procedure details',
    items: [
      [
        {
          type: 'date',
          name: 'procedureDate',
          label: 'Date of procedure',
          id: 'procedureDate',
        },
        {
          type: 'txt',
          name: 'spineOrCluNumber',
          label: 'SPINE/CLU number',
          labelHelper: 'SPINE/CLU number prompting your referral',
          id: 'spineOrCluNumber',
        },
      ],
      [
        {
          type: 'textArea',
          name: 'procedureCodes',
          label: 'Procedure codes',
          id: 'procedureCodes',
        },
        {
          type: 'txt',
          name: 'procedureCodeTreatmentType',
          label: 'Procedure code treatment type',
          id: 'procedureCodeTreatmentType',
        },
      ],
    ],
  },

  {
    step: 4,
    heading: 'Your details',
    items: [
      [
        {
          type: 'txt',
          name: 'yourName',
          label: 'Your name',
          id: 'yourName',
        },
        {
          type: 'txt',
          name: 'yourEmailAddress',
          label: 'Your email address',
          id: 'yourEmailAddress',
        },
      ],
      [
        {
          type: 'txt',
          name: 'yourDept',
          label: 'Your department',
          id: 'yourDept',
          validationType: 'string',
          validations: [
            {
              type: 'required',
              params: ['this field is required'],
            },
          ],
        },
      ],
    ],
  },
];
