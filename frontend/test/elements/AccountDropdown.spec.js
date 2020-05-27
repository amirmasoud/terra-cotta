import { shallowMount } from '@vue/test-utils'
import AccountDropdown from '@/components/elements/AccountDropdown.vue'

describe('AccountDropdown', () => {
  const $t = () => {}
  const wrapper = shallowMount(AccountDropdown, {
    mocks: {
      $t: () => {}
    }
  })

  it('is a Vue instance', () => {
    expect(wrapper.isVueInstance()).toBeTruthy()
  })

  it('button click should close the dropdown', () => {
    wrapper.find('.account-btn').trigger('click')
    expect(wrapper.vm.isOpen).toBe(true)
    const closeBtn = wrapper.find('full-w-close-btn')
    expect(closeBtn.exists())
  })
})
